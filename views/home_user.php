<?php

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    //ajouter non de l'utilisateur
    $title = "Bienvenue";

    ob_start();


    //requête pour afficher le nom de l'utilisateur connecté
    $sth=$pdo->prepare('SELECT * FROM user WHERE username = :username');
    $sth->bindParam(':username', $username, PDO::PARAM_INT);
    $sth->execute();
    $username_echo=$sth->fetch()
?>

    <!--afficher nom de l'utilisateur connecté-->


    <div class="col-md-3 offset-md-4 form-div">
<!--Mettre le bon nom-->
                <h3>Bienvenue, <?php //echo$username_echo['username']; ?></h3>

        <div class="alert alert-warning">
                    en construction
        </div>
    </div>


<?php

    $content = ob_get_clean();
    require("template.php");

?>