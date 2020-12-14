<?php

use App\Connection;
$pdo = (new Connection())->getPdo();
$result = "";
$title = "coucou";
$erreur = "";

ob_start();

if (isset($_POST['submit'])) {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo 'Tous les champs sont requis';

    }
// Si tous les champs sont complétés
    if (!empty($_POST["username"]) && !empty($_POST["password"])) {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $username);
        $sth->execute(['username'=>$username, 'password'=>$password]);
        $result=$sth->fetch();
        session_start();
        $_SESSION['connecte']=1;
        header('Location: /home_admin');
    } else {
        $erreur='Identifiants incorrectes ';
    }

    require_once '../views/functions/authen.php';
    if (est_connecte()) {
        header('Location: /home_admin');
        exit();
    }
    if ($result){

        $role_id = $result['role_id'];
        $_SESSION['id']=$result['id'];
        if ($role_id== 1){

            header('Location: /home_admin');
        }
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
<?php if ($erreur): ?>
    <div class="alert alert-danger">
        <?=$erreur?>
    </div>
<?php endif; ?>

<form action="#" method="POST">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" class="Name" placeholder="nom d'utilisateur">


        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

</form>
    <?php
    $content = ob_get_clean();
    require("template_login.php");

    ?>











