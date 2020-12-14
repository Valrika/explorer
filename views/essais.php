
<?php

use App\Connection;
$pdo = (new Connection())->getPdo();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 5;

// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM fileup ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_files = $pdo->query('SELECT COUNT(*) FROM fileup')->fetchColumn();
?>
<!DOCTYPE html>
<html lang="fr">
<script src="https://kit.fontawesome.com/31cfd28a45.js" crossorigin="anonymous"></script>
<div class="content read">
    <h2>Tous vos fichiers</h2>
    <a href="/create" class="create-contact">Ajouter un fichier</a>
    <table>
        <thead>
        <tr>
            <td>#</td>
            <td>name</td>
            <td>file</td>
            <td>Created</td>
            <td></td>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($files as $file): ?>
            <tr>
                <td><?=$file['id']?></td>
                <td><?=$file['name']?></td>
                <td><?=$file['file']?></td>
                <td><?=$file['created']?></td>
                <td class="actions">
                    <a href="../upload/update.php?id=<?=$file['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="../upload/delete.php?id=<?=$file['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="/essais?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_files): ?>
            <a href="/essais?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>


</html>