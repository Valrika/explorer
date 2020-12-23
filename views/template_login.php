<!DOCTYPE html>
<html lang="fr">

<!--template appelé sur les pages où l'utilisateur n'est pas connecté-->

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
                    <div class="col-md-11 seeme2">

                        <li class="nav-item">

                            <!--Icône avatar-->

                            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0zM8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6 5c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                            </svg>


                    <a class="nav-item seeme2" href="/login">Se connecter</a>
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
                </ul>

                <ul class="sidebar-nav sidebar" >
                    <li><a href="#">Partage public</a></li>
                </ul>

                <ul class="sidebar-nav sidebar_menu">
                    <li>
                        <a class="seeme2" href="/inscription">Créer un compte</a>
                    </li>
                </ul>

            </div>
        </div>

        <!--Contenu exemple-->

        <div class="container">
            <?= $content ?>
        </div>

    </div>

</body>


