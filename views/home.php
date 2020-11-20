<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "Explorateur de fichier Valrika";

ob_start();
?>

    <div class="container w-50 h-50">
        <form>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="entrez votre email" placeholder="Email">
                    </div>

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" placeholder="Mot de passe">
                    </div>
                    <button type="submit" class="btn btn-info">Se connecter</button>
                </div>
            </div>
        </form>
    </div>

    <!--se connecter et ou créer un compte en haut à droite-->
    <!--
    <head>
        <title>Accueil</title>
    </head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-4 form-div">
                Formulaire de connexion fait
<br>
                <div class="alert alert-succes">
                  Vous êtes maintentenant connecté !
                </div>

                <h3>Bienvenue, Valérie </h3>

                <a href="#">Déconnexion</a>

                <div class="alert alert-warning">
                    Connectez-vous à votre messagerie et cliquez sur le
                    lien de vérification que nous vous avons envoyé à
                    <strong>valerie_ekoume@hotmail.com</strong>

                    <button class="btn btn-block btn-md btn-light">Email vérifié</button>
            </div>
        </div>
    </div>
</body>
-->
<?php
$content = ob_get_clean();

require("template.php");
?>