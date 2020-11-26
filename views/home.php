<?php

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "Accueil";

    ob_start();
?>

    <!--page d'accueil par défaut si pas de connexion

    sur chaque page du site : tester si déjà connecté

    si oui -> home_after login
    si non -> home-->

<div class="page-container">

    <form action="#" method="POST">

        <h1>Inscription</h1>

        <label for="name">Comment voulez-vous qu'on vous appelle ?</label>
        <input type="text" name="name" class="Name" placeholder="nom ou pseudonyme">

        <label for="email">Email</label>
        <small id="email" class="form-text text-muted">Nous ne vendrons jamais vos données :)</small>
        <input type="text" name="email" class="Email" placeholder="email">


        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <!--
        <label for="passwordConfirm">Confirmez votre mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="confirmer le mot de passe">

            <input class="form-check-input" type="checkbox" value="" id="check">
            <label class="form-check-label" for="check">
                Je ne suis pas un robot
            </label>
        -->

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

    </form>
</div>

<?php
    $content = ob_get_clean();
    require("template.php");
?>