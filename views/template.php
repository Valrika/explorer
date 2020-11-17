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


    <div id="" class="wrapper active">
        <div id="" class="sidebar-wrapper">
            <ul id="" class="sidebar-nav sidebar_menu">
                <li class="sidebar-brand"><a id="" href="#">Menu</a></li>
            </ul>
            <ul id="" class="sidebar-nav sidebar" >
                <li><a href="#">Utilisateur</a></li>
                    <li><a href="#">Documents</a></li>
                    <li><a href="#">Partage</a></li>
            </ul>
        </div>

    <body class ="bg-th1-3">
        <div >

        <?= $content ?>

        </div>

    </body>



</html>