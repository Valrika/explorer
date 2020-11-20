<?php

/*$erreur = null;
if (!empty($_POST['username']) && !empty($_POST['pwd'])) {
    if ($_POST['username'] === 'Val' && $_POST['pwd'] === 'Vali') {
        session_start();
        $_SESSION['connecte'] = 1;
        header('Location: /c-login');
        exit();
    }else {
$erreur ="identifiantd incorrects";
    }

}
require '../src/auth.php';
if (est_connecte()) {
    header('Location: /c-login');
    exit();
}*/

?>
<?php

use App\Connection;
$erreur = null;
$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
require("template.php");
require_once '../controllers/c-login.php' ;
?>

<?php if ($erreur): ?>
<div class="alert alert-danger">
</div>
<?php endif ?>


<section class="signup-form">
    <h3 class="text-center">Connection</h3>
    <div class="signup-form-form">

        <form action="" method="post">
            <div class="form-group">
                <input type="text" name="username" placeholder="nom d'utilisateur" ">
            </div>
            <!-- Dans type on écrit password pour que l'utilisateur puisse le taper en toute discrétion -->
            <div class="form-group">
                <input type="password" name="pwd" placeholder="Password" ">
            </div>
            <button type="submit" name="submit">Connexion</button>
        </form>
    </div>



</section>


