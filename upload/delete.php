<?php
include_once '../views/home_admin.php';

use App\Connection;
$pdo = (new \App\Connection())->getPdo();
$msg = '';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

//Requête pour suppression du fichier dans la bdd
    $sql="DELETE FROM fileup WHERE id=:id";
    $query=$pdo->prepare($sql);
    if ($query->execute(array(':id'=>$id)))
    {
        echo 'Votre fichier a été supprimé avec succès';

//Redirection vers la page home_admin
        header("Location:/home_admin");
    }
}

?>


