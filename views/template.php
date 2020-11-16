

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
        <link rel="stylesheet" href="../public/assets/icon/style.css" />
    </head>


    <!--navbar sur le côté à gauche-->
    <nav class="navbar fixed-top .flex-column navbar-dark bg-light">
        <a href="#" class="navbar-brand">Mes documents</a>
        <a href="#" class="navbar-brand">Utilisateurs</a>
        <a href="#" class="navbar-brand">Se connecter</a>
        <a href="#" class="navbar-brand">Partage</a>
    </nav>


    <body>



        <?= $content ?>
    </body>



</html>