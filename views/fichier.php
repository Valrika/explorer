<?php
// MISE EN PAGE POUR LE FORMULAIRE UPLOAD DE FICHIERS
    include_once '../upload/file_upload.php';

    use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "Importer un fichier";

    ob_start();

?>



<!DOCTYPE html>
<html lang="fr">


<br>
<br>

<form method='post' action='' enctype='multipart/form-data' class="form-group col-md-6">
    <input type='file' name='files[]' multiple />
    <input type='submit' value='Submit' name='submit' />
</form>

<br>
<br>


<?php
    $content = ob_get_clean();
    require("template.php");
?>
