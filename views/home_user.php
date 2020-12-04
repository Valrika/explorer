<?php

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    //ajouter non de l'utilisateur
    $title = "Bienvenue";
    ob_start();

?>

    <!--afficher -->


    <div class="col-md-3 offset-md-4 form-div">

                <h3>Bienvenue, Valérie </h3>

        <div class="alert alert-warning">
                    en construction
        </div>
    </div>


<?php

    $content = ob_get_clean();
    require("template.php");

?>