<?php
    //PAGE EN LIAISON AVEC LOGIN.PHP
    //sert par exemple l25 dans login.php
    use App\Connection;

    function est_connecte ():bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
            return !empty($_SESSION['connecte']);
        }


 function forcer_utilisateur_connecte (): void
    {
        if (!est_connecte()) {
            header('location: /login');
            exit();

        }
    }