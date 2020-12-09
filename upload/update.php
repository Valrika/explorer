<?php

use App\Connection;
$pdo = (new Connection())->getPdo();


$msg='';
// Check if the file id exists, for example update.php?id=1 will get the contact with the id of 1
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // This part is similar to the create.php, but instead we update a record and not insert
        $id=isset($_POST['id']) ? $_POST['id'] : NULL;
        $name=isset($_POST['name']) ? $_POST['name'] : '';
        $file=isset($_POST['file']) ? $_POST['file'] : '';
        $created=isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
        // Update the record
        $stmt=$pdo->prepare('UPDATE fileup SET id = ?, name = ?, file = ?, created = ? WHERE id = ?');
        $stmt->execute([$id, $name, $file, $created, $_GET['id']]);
        $msg='Updated Successfully!';
    }
    // Get the contact from the contacts table
    $stmt=$pdo->prepare('SELECT * FROM fileup WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $file =$stmt->fetch(PDO::FETCH_ASSOC);
    if (!$file) {
        exit('Contact doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
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


