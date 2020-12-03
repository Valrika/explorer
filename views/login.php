<?php
require_once '../src/functions.php';
use App\Connection;

session_start();
$pdo=(new Connection())->getPdo();

$role = "";
$user = "";



// Condition pour accès au compte utilisateur.
// Si on appui sur le bouton se connecter (submit)
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






 ?>













