<?php

    //pas utilisé
    session_start();

    use App\Connection;

    $pdo = ( new Connection())->getPdo();


    // Now we check if the data from the login form was submitted, isset() will check if the data exists.
    if (isset($_POST['submit'])) {
        $username=$_POST["username"];
        $password=$_POST["password"];
        $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
        $sth->bindParam(':username', $username);
        $sth->execute(['username'=>$username, 'password'=>$password]);
        $result=$sth->fetchAll();

        if ($result === false){
            die('incorrect username/password combination');
        }else{
            $validPassword = ($password = $_POST['password']);

            if ($validPassword){
                header('location: /home_user');
            }
        }



    }




        /*} else {
            // Incorrect password
            echo 'Incorrect username and/or password!';
        }
        } else {
        // Incorrect username
        echo 'Incorrect username and/or password!';

    }*/

?>