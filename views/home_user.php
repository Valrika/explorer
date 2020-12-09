<?php



use App\Connection;

$pdo = (new Connection())->getPdo();

//ajouter non de l'utilisateur
$title = "Bienvenue";
ob_start();
?>

    <!--se connecter et ou créer un compte en haut à droite-->


    <<div class="col-md-3 offset-md-4 form-div">

                <!--TODO personnaliser le message d'accueil et le titre-->

                <h3>Bienvenue, Valérie </h3>

                <div class="alert alert-warning">
                    Vous pouvez maintenant organiser et télécharger vos fichiers.
            </div>
    </div>


<?php

$content = ob_get_clean();
require("template.php");
?>


?>