<?php
include_once '../views/home_admin.php';

use App\Connection;
$pdo = (new \App\Connection())->getPdo();
$msg = '';
//$file = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

//deleting the row from table
    $sql="DELETE FROM fileup WHERE id=:id";
    $query=$pdo->prepare($sql);
    if ($query->execute(array(':id'=>$id)))
    {
        echo 'Votre fichier a été supprimé avec succès';

//redirecting to the display page (index.php in our case)
        header("Location:/home_admin");
    }
}

?>


