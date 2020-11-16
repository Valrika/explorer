<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "contenu du site";
require("template.php");
?>

    <!--se connecter et ou créer un compte en haut à droite-->

    <div class"">
    <div class="mt-5 container col-md-6">
        <form action="" method="POST" enctype="multipart/form-data"><input type="file" name="file" class="form-control-file"><button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button>
        </form>
    </div>
    </div>


<?php

?>