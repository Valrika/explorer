<?php
if (session_status() == PHP_SESSION_NONE){
    session_start();

}
?>

<!DOCTYPE html>

<!--page depuis laquelle on affiche toute la structure de la page, vise à remplacer le header et le footer
les variables seront définies en fonction de la page dans laquelle le template s'affiche
exemple et explications ici :
https://openclassrooms.com/fr/courses/4670706-adoptez-une-architecture-mvc-en-php/4682286-creer-un-template-de-page-->

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/icon/style.css" />
</head>

<body>



<!--TODO créer une boucle pour tester si l'utilisateur est connecté ou non-->

<!--Si utilisateur PAS connecté :-->

<!--Si utilisateur connecté :-->

<nav class="nav nav-pills nav-fill fixed-top bg-th1-1">
    <div>
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        </svg>
    </div>
    <li>
        <a class="nav-link nav-item" href="#">Se connecter</a>
    </li>
    <form class="nav-item form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="que cherchez-vous ?" aria-label="search">
        <button class="btn btn-research my-2 my-sm-0" type="submit">Rechercher</button>
    </form>
</nav>

<div class="opacite">
    <div class="wrapper active">
        <div class="sidebar-wrapper">
            <ul class="sidebar-nav sidebar_menu">
                <li class="sidebar-brand"><a href="#">Menu</a></li>
            </ul>
            <ul class="sidebar-nav sidebar" >
                <li><a href="#">Utilisateur</a></li>
                <li><a href="#">Documents</a></li>
                <li><a href="#">Partage</a></li>
            </ul>
        </div>
    </div>

    <?= $content ?>
</div>

</body>

</html>