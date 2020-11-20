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


<section class="signup-form">
    <h3 class="text-center">Inscription</h3>
                <div class="signup-form-form">

                    <form action="../views/inscription.php" method="post">

                        <input type="text" name="uid" value="<?php /*echo $username; */?>" placeholder="Username">
                        <input type="text" name="email" value="<?php /*echo $email; */?>" placeholder="Email">
                        <input type="text" name="role"  placeholder="role">
                        <input type="password" name="password" placeholder="Password" "> <!-- Dans type on écrit password pour que l'utilisateur puisse le taper en toute discrétion -->
                        <input type="password" name="pwdrepeat" placeholder="Repeat password">
                        <button type="submit" name="submit">inscription</button>
                    </form>
                </div>



</section>


</body>
</html>