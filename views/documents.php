<?php

//page qui affiche tous les documents de l'utilisateur
//et permet de les ajouter, supprimer, télécharger, etc.
//ajouter nom de l'utilisateur


    use App\Connection;

    $pdo = (new Connection())->getPdo();
    $title = "Documents";
    ob_start();
?>

//répertoire dans l'explorateur de fichier
//le nom d'utilisateur est lié à l'id
//l'id, lié au nom d'utilisateur, est le nom du dossier dans le répertoire

<?php
    $content = ob_get_clean();
    require("template.php");
?>