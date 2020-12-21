<?php

    //page de déconnexion de l'utilisateur, renvoie vers login (ou home ?)

    session_start();
    unset($_SESSION['connecte']);
        header('Location: /login');

?>