<!DOCTYPE html>

<!--ESSAIS CONDITION POUR TEMPLATE-->

<!--SAVE 1 avec if + elseif + else-->
<?php

//Si l'utilisateur est connecté

if(isset($_SESSION["username"])) {

?>

       <h1>BONJOUR UTILISATEUR CONNECTE</h1>

    <?php
}

//Si la page est login ou inscription

elseif ($_SERVER['REQUEST_URI'] == '/login') {
    ?>
    <h1>PAGE LOGIN OU INSCRIPTION</h1>

    <?php
}

// Si l'utilisateur n'est pas connecté

else {
?>
    <h1>PAS CONNECTE</h1>
<?php
}
?>


<!--SAVE 2 avec if + elesif + endif-->

<?php

//Si la page est login ou inscription

if ($_SERVER['REQUEST_URI'] == '/login'):

    ?>

    <h1>PAGE LOGIN OU INSCRIPTION</h1>

<?php

//Si l'utilisateur n'est pas connecté

elseif(isset($_SESSION['user']) && !empty($_SESSION['user'])):

    ?>

    <h1>PAS CONNECTE</h1>


<?php
endif; ?>

<!--si l'utilisateur est connecté-->

    <h1>BONJOUR UTILISATEUR CONNECTE</h1>