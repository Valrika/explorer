<?php

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "Déconnexion";

    ob_start();

    //login_success.php
    session_start();
        if(isset($_SESSION["username"]))
            {
                echo '<h3>Login Success, Welcome - '.$_SESSION["username"].'</h3>';
                echo '<br /><br /><a href="logout.php">Logout</a>';
            }
        else
            {
                header("location:pdo_login.php");
            }

    $content = ob_get_clean();
    require("template_login.php");
?>