<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
require("template.php");


?>

    <!--se connecter et ou créer un compte en haut à droite-->

   <!-- <head>
        <title>Accueil</title>
    </head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-3 offset-md-4 form-div">
                <!-- Formulaire de connexion fait
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


</body> -->

<?php

?>