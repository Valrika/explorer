<?php

use App\Connection;
$pdo =(new Connection())->getPdo();

if (isset($_POST['submit'])) {

    //Récupérer le nom du fichier
    $title=$_POST['title'];

    //nom de fichier avec un nombre aléatoire afin que les éléments similaires ne soient pas remplacés
    $pname=rand(1000, 10000) . "-" . $_FILES['file']['name'];

    //Nom temporaire du fichier pour pouvoir le stocker dans la BDD
    $tname=$_FILES['file']['tmp_name'];

    //Téléchargement du chemin du dossier de téléchargement
    $upload_dir="Files";

    //pour ensuite déplacer les docs téléchargé vers un endroit spécifique
    move_uploaded_file($tname, $upload_dir . '/' . $pname);

    //query pour insertion vers la BDD
    $sql="INSERT INTO fileup (titre, image) VALUES ($title $pname)";

    $pdo->exec($sql);

    $result=$pdo;


    if ($result == true) {

        echo "Le fichier a été téléchérgé avec succès";
    } else {
        echo "Erreur";
    }



}
?>






<!DOCTYPE html>
<html lang="fr">
<head>
    <title>File Upload</title>
</head>
<body>

<form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title">
    <label>File Upload</label>
    <input type="file" name="fileToUpload">
    <input type="submit" name="submit">


</form>

</body>
</html>