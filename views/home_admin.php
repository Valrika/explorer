<?php

include_once '../upload/delete.php';
use App\Connection;
$pdo = (new Connection())->getPdo();

// Récupérer la page via la requête GET (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Définir le nombre de fichier enregistré sur une page
$records_per_page = 5;

// Préparation des instructions SQL (statement) pour la récupération des données de notre bdd (table fileup), LIMIT va déterminer le nbr de page
$stmt = $pdo->prepare('SELECT * FROM fileup ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// récupérer les données pour pouvoir les afficher sur le template.
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);
$num_files = $pdo->query('SELECT COUNT(*) FROM fileup')->fetchColumn();
?>


<!DOCTYPE html>
<html lang="fr">
<script src="https://kit.fontawesome.com/31cfd28a45.js" crossorigin="anonymous"></script>
<div class="content read">
    <h2>Tous vos fichiers</h2>
    <a href="/fichier" class="create-contact">Ajouter un fichier</a>
    <table>
        <thead>
        <tr>
            <td>id</td>
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
                    <!-- icones update et delete avec java script plus lien -->
                    <a href="/update?id=<?=$file['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="/delete?id=<?=$file['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <!-- Mise en page des données sur le template -->
    <div class="pagination">
        <?php if ($page > 1): ?>
            <a href="/home_admin?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
        <?php endif; ?>
        <?php if ($page*$records_per_page < $num_files): ?>
            <a href="/home_admin?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
        <?php endif; ?>
    </div>
</div>


</html>