<?php

<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

//ajouter non de l'utilisateur
$title = "Bienvenue";
ob_start();
?>

    <!--se connecter et ou créer un compte en haut à droite-->

    <head>
        <title>Accueil</title>
    </head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-4 form-div">
                <!-- affichage de home si utilisateur connecté -->

                <h3>Bienvenue, Valérie </h3>

            </div>
        </div>
    </div>


</body>

<?php

$content = ob_get_clean();
require("template.php");
?>


?>