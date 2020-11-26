<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
require("template.php");
require("../controllers/c-inscription.php")

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <!-- Boostrap css -->

    <title>Register</title>
</head>

<body>
    <?php  (count($errors) > 0); ?>
    <div class="alert alert-danger">
        <?php /*foreach ($errors as $error) */?>
        <li><?php /*echo $errors;*/ ?>></li>
    </div>

    <div class="page-container">

        <form action="#" method="POST">

            <h1>Inscription</h1>

            <label for="name">Comment voulez-vous qu'on vous appelle ?</label>
            <input type="text" name="name" value="<?php /*echo $username; */?>" class="Name" placeholder="nom ou pseudonyme">

            <label for="email">Email address</label>
            <input type="text" name="email" value="<?php /*echo $email; */?>" class="Email" placeholder="email">
            <small id="email" class="form-text text-muted">Nous ne vendrons jamais vos données</small>

            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="Address" placeholder="mot de passe">

            <label for="passwordConfirm">Confirmez votre mot de passe</label>
            <input type="password" name="password" class="Address" placeholder="confirmer le mot de passe">

            <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

        </form>
    </div>


</body>
</html>