<?php

use App\Connection;
//démarrer la session

$pdo = (new Connection())->getPdo();


//initialisation de la variable $errors pour qu'elle soit dispo globalement
$errors = array();
$username = "";
$pwd = "";
require_once '../views/template.php';



$sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
$sth->bindParam(':username', $username);
$sth->execute();
$result = $sth->fetchAll();

/*if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"]; {
        header('location: /c-login');
    }*/

        if (isset($_POST['username']) && !empty($_POST['password'])) {

           /* function validate($data){
                $data=trim($data);
                $data=stripcslashes($data);
                $data=htmlspecialchars($data);
                return $data;
            }*/

            $username= ($_POST['username']);
            $pwd= ($_POST['pwd']);

            if (empty($username)){
                //header('location: /c-login');
                exit();
            }elseif (empty($pwd)) {
                //header('location: /c-login');
                exit();
            } else{
                echo "validation";

            }

        }else{
            //header('location: /c-login');
            exit();



}



// Si le user click sur le button submit

    /*if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
        header('/c-login');

        $sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
        $sth->bindParam(':username', $username);
        $sth->execute();
        $result = $sth->fetchAll();

    //Validation on s'assure que le user utilise les valeurs requise pour la validation
        if (isset($_POST) && !empty($_POST)) {

            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $password = $_POST['password'];

                session_start();
                if (!$username) {
                    $_SESSION['erreur'] =  'Nom et/ou mot de passe invalide';
                } else {
                    if (password_verify($pwd, $username['pdw'])) {
                        $_SESSION['username'] = $pwd['pwd'];

                        header('/c-login');
                    } else {
                        $_SESSION['erreur'] = 'Nom et/ou mot de passe invalide';
                    }
                }
            } else {
                $_SESSION['erreur'] = "Veuillez remplir tous les champs...";
            }
        }
    //Connection + requête à la bdd pour récupérer username et mail
    $sth = $pdo->prepare('SELECT * FROM user WHERE username = :username');
    $sth->bindParam(':username', $username);
    $sth->execute();
    $result = $sth->fetchAll();



    //Conditions à remplir pour se connecter à la bdd



}*/