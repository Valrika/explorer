<?php
use App\Connection;
$pdo =(new Connection())->getPdo();
$title = "";

$target_dir = "../Files";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Si le fichier est une image, message
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {

        echo "Le fichier est une image - " . $check["mime"] . ".";
        $uploadOk = 1;

        //Au cas où on souhaite seu
    /*} else {
        echo "File is not an image.";
        $uploadOk = 0;*/
    }
}

// POur vérifier si le fichier existe déjà
if (file_exists($target_file)) {
    echo "Désolé ce fichier existe déjà.";
    $uploadOk = 0;
}

// Vérifier La taille du fichier si il est > 700000 pas accepté
if ($_FILES["fileToUpload"]["size"] > 700000) {
    echo "Désolé la taille du fichier est trop grande.";
    $uploadOk = 0;
}

// Allow certain file formats
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "SDésolé votre fichié n'apas été téléchargé.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
