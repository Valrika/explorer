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


<div class="page-container">

    <form action="#" method="POST">

        <h1>Inscription</h1>

        <label for="name">Comment voulez-vous qu'on vous appelle ?</label>
        <input type="text" name="name" class="Name" placeholder="nom ou pseudonyme">

        <label for="email">Email address</label>
        <input type="text" name="email" class="Email" placeholder="email">
        <small id="email" class="form-text text-muted">Nous ne vendrons jamais vos données</small>

        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <label for="passwordConfirm">Confirmez votre mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="confirmer le mot de passe">

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

    </form>
</div>


</body>

<?php

$content = ob_get_clean();
require("template.php");
?>