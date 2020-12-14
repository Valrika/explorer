
<?php
// PAGE ESSAIE POUR MES TESR NE PAS EN TENIR COMPTE

use App\Connection;
$pdo = (new Connection())->getPdo();
$erreur = "";


if (!empty($_POST['username']) && !empty($_POST['password'])){
    if($_POST['username'] === 'vali' && $_POST['password'] === 'vali'){
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /home_admin');
    }else{
        $erreur = 'Identifiants incorrectes ';
    }
}

require '../src/authen.php';
if (est_connecte()){
    header('Location: /home_admin');
    exit();
}
?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
    <?=$erreur?>
</div>
<?php endif; ?>
<form action="#" method="POST">

        <label for="username">Nom d'utilisateur</label>
        <input type="text" name="username" class="Name" placeholder="nom d'utilisateur">


        <label for="password">Mot de passe</label>
        <input type="password" name="password" class="Address" placeholder="mot de passe">

        <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>
    <button class="btn btn-info btn-margin" type="lo" value="Add" name="submit">Envoyer</button>

    <?php


        //$content = ob_get_clean();
        //require("template.php");
 ?>
