<!DOCTYPE html>

<!--ESSAIS CONDITION POUR TEMPLATE-->

<!--SAVE 1 avec if + elseif + else-->
<?php

//Si l'utilisateur est connecté

if(isset($_SESSION["username"])) {

?>

       <h1>BONJOUR UTILISATEUR CONNECTE</h1>

    <?php
}

//Si la page est login ou inscription

elseif ($_SERVER['REQUEST_URI'] == '/login') {
    ?>
    <h1>PAGE LOGIN OU INSCRIPTION</h1>

    <?php
}

// Si l'utilisateur n'est pas connecté

else {
?>
    <h1>PAS CONNECTE</h1>
<?php
}
?>


<!--SAVE 2 avec if + elesif + endif-->

<?php

//Si la page est login ou inscription

if ($_SERVER['REQUEST_URI'] == '/login'):

    ?>

    <h1>PAGE LOGIN OU INSCRIPTION</h1>

<?php

//Si l'utilisateur n'est pas connecté

elseif(isset($_SESSION['user']) && !empty($_SESSION['user'])):

    ?>

    <h1>PAS CONNECTE</h1>


<?php
endif; ?>

<!--si l'utilisateur est connecté-->

    <h1>BONJOUR UTILISATEUR CONNECTE</h1>





<!--SAVE 26/10-->

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
    <!--NAVBAR - couleur bouton ?-->
    <nav class="navbar navbar-expand-lg navbar-light bg-th1-1">
        <ul class="navbar-nav mr-auto">


            <!--affichage joli username sous l'avatar-->
            <div class="row mb-6">

                <div class="col-md-11 avatar">
                    <li class="nav-item">

                        <!--Icône avatar-->
                        <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                        </svg>

                        <?php

                        //Accueil personnalisé - TODO mettre nom en gras ?
                        if (isset($_SESSION['username'])) {
                            echo $_SESSION['username'];
                        }
                        ?>
                    </li>
                </div>
            </div>
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

                <li class="sidebar-brand">
                    <a href="#">Menu</a>
                </li>
                <li>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-5"
                            aria-controls="navbarSupportedContent-5" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </li>
            </ul>

            <ul class="sidebar-nav sidebar" >
                <li><a href="#">Mon espace</a></li>
                <li><a href="/documents">Partage</a></li>
            </ul>


            <ul class="sidebar-nav sidebar_menu">
                <li>
                    <a class="seeme" href="/logout">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>

    <!--Contenu des différentes pages-->

    <div class="container-fluid">
        <?= $content  ?>
    </div>

</div>

</body>