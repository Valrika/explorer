<?php

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "Accueil";

    ob_start();
?>

<div class="page-container">

    <h1>CONTENU FICTIF POUR EXEMPLE</h1>

</div>

<?php
    $content = ob_get_clean();
    require("template_login.php");
?>