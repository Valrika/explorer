<?php

    require_once '../views/user_space.php';

    use App\Connection;
    $pdo = (new \App\Connection())->getPdo();
    $msg = '';

    //id = id passé à l'url
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

    //Requête pour suppression du fichier dans la bdd
        $sql="DELETE FROM fileup WHERE id=:id";
        $query=$pdo->prepare($sql);
        if ($query->execute(array(':id'=>$id)))
        {
            echo 'Votre fichier a été supprimé avec succès';

            exit();

        }
    }

?>


