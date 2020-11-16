

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


    <!--navbar sur le côté à gauche-->

    <div id="wrapper" class="active">
        <!-- Sidebar -->
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul id="sidebar_menu" class="sidebar-nav">
                <li class="sidebar-brand"><a id="menu-toggle" href="#">Menu<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
            </ul>
            <ul class="sidebar-nav" id="sidebar">
                <li><a>Utilisateur<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                <ul class="sidebar-nav" id="sidebar">
                    <li><a>Documents<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
                    <li><a>Partage<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
        </div>

        <!--
   <ul class="nav flex-column">
       <li class="nav-item">
           <a class="nav-link active" href="#">Mes documents</a>
       </li>

       <div class="collapse"
       <li class="nav-item">
           <a class="nav-link active" href="#">Utilisateurs</a>
       </li>


       <li class="nav-item">
           <a class="nav-link active" href="#">Partage</a>
       </li>
       <li>
           <a href="#" class="nav-link active">Se connecter</a>
       </li>
   </ul>
   -->

    <body>

        <?= $content ?>
    </body>



</html>