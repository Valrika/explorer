<!DOCTYPE html>
<html lang="fr">

<!--template appelé sur chaque page où l'utilisateur est connecté-->

<head>
    <meta charset="utf-8"/>
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/icon/style.css" />
</head>

<body>

    <div class="opacite">
        <!--NAVBAR - Alignenement droite et gauche ?? couleur bouton ?-->
        <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                </li>

            <!--affichage joli username-->

                <li class="nav-item">
            <?php
                //if (isset($_SESSION['username'])) {
                    // Accueil personnalisé quand le user arrive sur la page
                    //echo $_SESSION['username'];
                //}
            ?>
                </li>

                <li class="nav-item">
                    <?php //if ($user->getUsers()): ?>
                        <a class="nav-link nav-item" href="/logout">Déconnexion</a>
                    <?php //endif; ?>
                </li>
            </ul>

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
            <?= $content  ?>
        </div>

    </div>

</body>
