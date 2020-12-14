<!DOCTYPE html>

<!--ESSAIS BOUCLE-->

<!--SAUVEGARDE DE TEMPLATE POUR ESSAIS SAVE 1-->

<html lang="fr">
<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/icon/style.css" />
</head>

<body>

<?php
//Si l'utilisateur est connecté

if(isset($_SESSION["username"])) {
    ?>

    <div class="opacite">
        <!--NAVBAR - Alignenement droite et gauche ?? couleur bouton ?-->
        <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
            </svg>
            <a class="navbar-brand" href="/logout">Déconnexion</a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </nav>

        <!--SIDEBAR-->
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <ul class="sidebar-nav sidebar_menu">
                    <!--Icone menu ?-->
                    <li class="sidebar-brand"><a href="#">Menu</a></li>
                </ul>
                <ul class="sidebar-nav sidebar" >
                    <li><a href="#">Mon espace</a></li>
                    <li><a href="/documents">Mes documents</a></li>
                    <li><a href="#">Partage</a></li>
                </ul>
            </div>
        </div>

        <!--Contenu des différentes pages-->

        <div class="container">
            contenu de la page demandée

        </div>

    </div>

    <?php
}

//Si la page est login ou inscription

elseif ($_SERVER['REQUEST_URI'] == '/login') {
    ?>

    <div class="opacite">
        <!--NAVBAR - Alignement droite et gauche ?? couleur bouton ?-->
        <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            <a class="navbar-brand" href="/login">Se connecter</a>
            <a class="navbar-brand" href="/inscription">Créer un compte</a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </nav>

        <!--SIDEBAR-->
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <ul class="sidebar-nav sidebar_menu">
                    <!--Icone menu ?-->
                    <li class="sidebar-brand"><a href="#">Menu</a></li>
                </ul>
                <ul class="sidebar-nav sidebar" >
                    <li><a href="#">Partage public</a></li>
                    <li><a href="#">Créer un compte</a></li>
                </ul>
            </div>
        </div>

        <!--Contenu exemple-->

        <div class="container">

            <div>
                page en question
                <?php include('/login.php'); ?>
            </div>

        </div>

    </div>

    <?php
}

// Si l'utilisateur n'est pas connecté

else {
?>

<div class="opacite">
    <!--NAVBAR - Aligenement droite et gauche ?? couleur bouton ?-->
    <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
        </svg>
        <a class="navbar-brand" href="/login">Se connecter</a>
        <a class="navbar-brand" href="/inscription">Créer un compte</a>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </nav>

    <!--SIDEBAR-->
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <ul class="sidebar-nav sidebar_menu">
                <!--Icone menu ?-->
                <li class="sidebar-brand"><a href="#">Menu</a></li>
            </ul>
            <ul class="sidebar-nav sidebar" >
                <li><a href="#">Partage public</a></li>
                <li><a href="#">Créer un compte</a></li>
            </ul>
        </div>
    </div>

    <!--Contenu exemple-->

    <div class="container">

        Contenu exemple d'explorateur

    </div>

</div>

<?php
}
?>


<!--SAVE 2-->
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
    <link rel="stylesheet" href="../assets/icon/style.css" />
</head>

<body>

<?php

//Si la page est login ou inscription

if ($_SERVER['REQUEST_URI'] == '/login'):

    ?>

    <div class="opacite">
        <!--NAVBAR - Alignement droite et gauche ?? couleur bouton ?-->
        <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            <a class="navbar-brand" href="/login">Se connecter</a>
            <a class="navbar-brand" href="/inscription">Créer un compte</a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </nav>

        <!--SIDEBAR-->
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <ul class="sidebar-nav sidebar_menu">
                    <!--Icone menu ?-->
                    <li class="sidebar-brand"><a href="#">Menu</a></li>
                </ul>
                <ul class="sidebar-nav sidebar" >
                    <li><a href="#">Partage public</a></li>
                    <li><a href="#">Créer un compte</a></li>
                </ul>
            </div>
        </div>

        <!--Contenu exemple-->

        <div class="container">

            <div>
                page en question
                <?php //include('/login.php'); ?>
            </div>

        </div>

    </div>

<?php

//Si l'utilisateur n'est pas connecté

elseif(isset($_SESSION['user']) && !empty($_SESSION['user'])):

    ?>

    <div class="opacite">
        <!--NAVBAR - Aligenement droite et gauche ?? couleur bouton ?-->
        <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
            </svg>
            <a class="navbar-brand" href="/login">Se connecter</a>
            <a class="navbar-brand" href="/inscription">Créer un compte</a>

            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Rechercher</button>
            </form>
        </nav>

        <!--SIDEBAR-->
        <div class="wrapper">
            <div class="sidebar-wrapper">
                <ul class="sidebar-nav sidebar_menu">
                    <!--Icone menu ?-->
                    <li class="sidebar-brand"><a href="#">Menu</a></li>
                </ul>
                <ul class="sidebar-nav sidebar" >
                    <li><a href="#">Partage public</a></li>
                    <li><a href="#">Créer un compte</a></li>
                </ul>
            </div>
        </div>

        <!--Contenu exemple-->

        <div class="container">

            Contenu exemple d'explorateur

        </div>

    </div>

<?php
endif; ?>

<!--si l'utilisateur est connecté-->

<div class="opacite">
    <!--NAVBAR - Alignenement droite et gauche ?? couleur bouton ?-->
    <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
        </svg>
        <a class="navbar-brand" href="/logout">Déconnexion</a>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" placeholder="Rechercher" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Rechercher</button>
        </form>
    </nav>

    <!--SIDEBAR-->
    <div class="wrapper">
        <div class="sidebar-wrapper">
            <ul class="sidebar-nav sidebar_menu">
                <!--Icone menu ?-->
                <li class="sidebar-brand"><a href="#">Menu</a></li>
            </ul>
            <ul class="sidebar-nav sidebar" >
                <li><a href="#">Mon espace</a></li>
                <li><a href="/documents">Mes documents</a></li>
                <li><a href="#">Partage</a></li>
            </ul>
        </div>
    </div>

    <!--Contenu des différentes pages-->

    <div class="container">
        contenu de la page demandée

    </div>

</div>

