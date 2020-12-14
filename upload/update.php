<?php

use App\Connection;
$pdo = (new Connection())->getPdo();


$msg='';
// Vérifification le fichier a bien un ID ? Par ex update.php?id=1 va mettre à jour le fichier dont qui a pour ID  1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        //utilisation de l'opérateur ternaire  qui permet de retourner 1 valeur parmi 2 valeurs e fonction de la condition
        //Pour plus d'info http://www.finalclap.com/faq/102-php-operateur-ternaire
        $id=isset($_POST['id']) ? $_POST['id'] : NULL;
        $name=isset($_POST['name']) ? $_POST['name'] : '';
        $file=isset($_POST['file']) ? $_POST['file'] : '';
        $created=isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        //  requête pour une MAJ du fichier
        $stmt=$pdo->prepare('UPDATE fileup SET id = ?, name = ?, file = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $name, $file, $created, $_GET['id']]);
        $msg='Updated Successfully!';
    }
    // trouver le fichier dans la table fileup  à partir d'un id
    $stmt=$pdo->prepare('SELECT * FROM fileup WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $file =$stmt->fetch(PDO::FETCH_ASSOC);
    //Si le fichier est introuvable
    if (!$file) {
        exit('Aucun fichier avec cet ID n\'a été trouvé !');
    }
} else {
    exit('Aucun ID n\'est spécifié!');
}    
    ?>

<!DOCTYPE html>
<html lang="fr">

<div class="content update">
    <h2>Update fichier #<?=$file['id']?></h2>
    <form action="update.php?id=<?=$file['id']?>" method="post">
        <label for="id">ID</label>
        <input type="text" name="id" placeholder="1" value="<?=$file['id']?>" id="id">
        <label for="name">Name</label>

        <input type="text" name="name" placeholder="John Doe" value="<?=$file['name']?>" id="name">
        <label for="title">fichier</label>

        <input type="text" name="file" placeholder="Employee" value="<?=$file['file']?>" id="title">
        <label for="created">Date de création du fichier</label>
        <input type="datetime-local" name="created" value="<?=date('Y-m-d\TH:i', strtotime($file['created']))?>" id="created">
        <input type="submit" value="Update">
    </form>
    <?php if ($msg): ?>
        <p><?=$msg?></p>
    <?php endif; ?>
</div>


