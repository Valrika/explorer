<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
ob_start();
session_start();
?>

    <!--page d'accueil par défaut si pas de connexion

    sur chaque page du site : tester si déjà connecté

    si oui -> home_after login
    si non -> home-->

    <head>
        <title>Accueil</title>
    </head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-4 form-div">

                <!--TODO personnaliser le message d'accueil et le titre-->

                <h3>Bienvenue, Valérie </h3>

                <div class="alert alert-warning">
                    Vous pouvez maintenant organiser et télécharger vos fichiers.
            </div>
        </div>
    </div>


</body>

<?php

$content = ob_get_clean();
require("template.php");
?>