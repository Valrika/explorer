<?php



    header('Location: /inscription');


//page de déconnexion de l'utilisateur, renvoie vers home ?


    $content = ob_get_clean();
    require("template_login.php");
?>