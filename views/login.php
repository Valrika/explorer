<?php
    require_once '../src/functions.php';
    use App\Connection;

    $pdo=(new Connection())->getPdo();


    $title = "Se connecter";

    ob_start();

$result = "";


if (isset($_POST['submit'])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo 'Tous les champs sont requis';

    }
// Si tous les champs sont complétés
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username=$_POST["username"];
        $password=$_POST["password"];
        //Requête pour récupérer les identifiants dans la bdd pour accès
        $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $username);
        $sth->execute(['username'=>$username, 'password'=>$password]);
        $result=$sth->fetch();
    }
    //Si les identifiants sont correctes
    if ($result){
    // Mise en place de l'authentification
        $role_id = $result['role_id'];
        $_SESSION['id']=$result['id'];
        //Permission pour admin = 1
        if ($role_id== 1){
            header('Location: /home_admin');
        }
        //permission pour user = 2
        elseif ($role_id = 2){
            header('location: /home_user');
        }
    }
    else{
        if ($result == false) {
            echo "Vos identifiants ne sont pas correctes, veuillez les saisir à nouveau";
        }

    }

}
?>

<form action="#" method="POST">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" class="Name" placeholder="nom d'utilisateur">


        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

    <h3>Pas encore inscrit ? <a href="/inscription">Créez un compte</a></h3>

    <?php


        $content = ob_get_clean();
        require('template_login.php');
 ?>













