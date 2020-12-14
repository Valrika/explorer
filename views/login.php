<?php
    require_once '../src/functions.php';
    use App\Connection;

    $pdo=(new Connection())->getPdo();

    $role = "";
    $user = "";

    $title = "Se connecter";

    ob_start();
?>

<form action="#" method="POST">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" class="Name" placeholder="nom d'utilisateur">


        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

    <h3>Pas encore inscrit ? <a href="/inscription">Créez un compte</a></h3>

    <?php

        // Condition pour accès au compte utilisateur.
        // Si on appuie sur le bouton se connecter (submit)
            if(isset($_POST["submit"])) {

                //Si le formulaire n'est pas complètement remplie message d'erreur
                if (empty($_POST["username"]) || empty($_POST["password"])) {
                    echo 'Tous les champs sont requis';

                }
                // Si tous les champs sont complétés
                if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                    $username=$_POST["username"];
                    $password=$_POST["password"];

                    // On compare les informations remplies par le user et celles de la BDD
                    try {
                        $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
                        $sth->bindParam(':username', $username);
                        $sth->execute(['username'=>$username, 'password'=>$password]);
                        $result=$sth->fetch();
                    // Si elles correspondent le user est dirigé vers home_user
                      if ($result == true){

                          header('Location: /home_user');
                      }
                      //Sinon message d'erreur
                      if ($result == false){
                          echo "Vos identifiants ne sont pas correctes, veuillez les saisir à nouveau";
                      }


                    } catch (Exception $exception) {

                        echo "".$exception->getMessage();
                    }


                }
            }

        $content = ob_get_clean();
        require('template_login.php');
 ?>













