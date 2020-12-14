<?php

require_once '../views/functions/authen.php';
forcer_utilisateur_connecte();

include_once '../upload/delete.php';

use App\Connection;
$pdo = (new Connection())->getPdo();



//ajouter non de l'utilisateur
$title = "Bienvenue";





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
<div class="content-read">
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
                    <a href=../images/love.jpg"<i class="fa fa-file-image-o" aria-hidden="true"></i></a><a href="/update?id=<?=$file['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="/delete?id=<?=$file['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                    <a href="/print?id=<?=$file['id']?>" class="trash"><i class="fa fa-print" aria-hidden="true"></i></a>
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

    <div class="opacite">

    <nav class="nav nav-pills nav-fill fixed-top bg-th1-1">
        <div>
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <ul>

            <?php if (est_connecte()): ?>
                <a class="nav-link nav-item" href="/logout">Déconnexion</a>
            <?php endif; ?>
        </ul>
        <form class="nav-item form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="search">
        </form>
    </nav>

    <div class="wrapper active">
        <div class="sidebar-wrapper">
            <ul class="sidebar-nav sidebar_menu">
                <li class="sidebar-brand"><a href="#">Menu</a></li>
            </ul>
            <ul class="sidebar-nav sidebar" >
                <li><a href="#">Utilisateur</a></li>
                <li><a href="/documents">Documents</a></li>
                <li><a href="#">Partage</a></li>
            </ul>
        </div>
    </div>



<?php