<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
require("template.php");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- Boostrap css -->

    <title>Register</title>
</head>

<body>
<!-- Le .inc est pour différencier les deux fichiers inscription. Dans le fichier  inscription.inc.php on trouverar la prog php qui va permettre de gérer inscription.php -->

<div class="container">
    <div class="row">
        <div class="col-md-3 offset-md-4 form-div">
            <br>
            <br>
            <!-- Formulaire d'inscription fait avec boostrap-->
            <form action="" method="post">
                <h3 class="text-center">Inscription</h3>
                <br>
                <div class="form-group">
                    <label for="username">nom</label>
                    <input type="text" name="username"  class="form-control-lg">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control-lg">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" class="form-control-lg"> <!-- Dans type on écrit password pour que l'utilisateur puisse le taper en toute discrétion -->
                </div>

                <div class="form-group">
                    <label for="passwordConf">Confirmez le mot de passe</label>
                    <input type="password" name="Confirm Password" class="form-control-lg">
                </div>

                <div class="form-group">
                    <button type="submit" name="signup-btn" class="btn btn-light btn-md">Inscription</button>
                </div>
                <p class="text-center">Déjà membre ? <a href="login.php">Connectez-vous</a></p>
            </form>

        </div>
    </div>
</div>



</body>
</html>