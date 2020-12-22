<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

if(isset($_POST['submit'])) {

// Compter le nombre total de fichiers avec count (fonction qui retourne le nombre d'éléments dans un tableau)
    // $_FILES est une Variable de téléchargement de fichier (superglobale)
    $countfiles=count($_FILES['files']['name']);

    // Preparer la requête
    $query = "INSERT INTO fileup (name, file) VALUES(?,?)";

    $statement = $pdo->prepare($query);

    // Faire une boucle
    for($i=0;$i<$countfiles;$i++){

        // Le nom du fichier
        $filename = $_FILES['files']['name'][$i];

        // Location
        $target_file = 'Files/'.$filename;

        // file extension
        // path_info est une fonction qui retourne des infos sur le path (chemin), sous forme de chaine ou de tableau associatif
        $file_extension = pathinfo($target_file, PATHINFO_EXTENSION);
        //strtolower est une fonction qui renvoie une chaine de caractère en minuscule
        $file_extension = strtolower($file_extension);

        // Vérifier que l'extension du fichier est bien valide
        $valid_extension = array("png","jpeg","jpg",'pdf', 'docx');
        // Si les 2 conditions sont remplies à savoir le chemin et l'extension du fichier sont correctes
        if(in_array($file_extension, $valid_extension)){

            // Alors les fichiers peuvent être téléchargés
            if(move_uploaded_file($_FILES['files']['tmp_name'][$i],$target_file)){

                // Execution de la requête
                $statement->execute(array($filename,$target_file));



            }
        }

    }

    header('location: /home_admin');


}