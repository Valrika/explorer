<?php

require_once '../views/functions/authen.php';

forcer_utilisateur_connecte();

include_once '../upload/delete.php';

use App\Connection;
use App\Model\User;
use App\DataLogin;


$user = new DataLogin();

$role = $user->getUsers()['role_id'];


$pdo = (new Connection())->getPdo();
$title = "coucou";
$erreur = "";

//ob_start();
//$role = $_SESSION['username']['id_role'];



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
<br>
<br>
<div class="content-read">
    <!--Condition qui permet l'affichage du username du user si celui si est connecté-->
   <?php
   if (isset($_SESSION['username'])) {
       // Accueil personnalisé quand le user arrive sur la page
       echo "Bonjour ".$_SESSION['username'];
   }


    ?>
    <h2>Tous vos fichiers</h2>

<br>
  <br>



    <div class="table_home">

        <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">file</td>
            <th scope="col">Created</td>
            <th scope="col">Action</td>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($files as $file): ?>

            <tr scope="row">
                <td><?=$file['id']?></td>
                <td><?=$file['name']?></td>
                <td><?=$file['file']?></td>
                <td><?=$file['created']?></td>
                <td align="center" class="actions">

                    <!-- icones update, print et delete avec fontawsome -->

                    <!-- Authorisation - Condition qui permet l'accès au boton de modif sur le fichier par l'admin
                    le user n'y a pas accès-->
                    <?php if ($role === "1"): ?>
                        <a href="/update?id=<?=$file['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                        <a href="/delete?id=<?=$file['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                        <a href="/print?id=<?=$file['id']?>" class="trash"><i class="fa fa-print" aria-hidden="true"></i></a>
                    <?php endif ?>


                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>

    <!-- Mise en page des données sur le template à savoir nombre de fichiers par page -->
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

    <div class="">

    <nav class="nav nav-pills nav-fill fixed-top bg-th1-1">
        <div>
            <svg width="2em" height="2em" viewBox="0 0 16 16" class="bi bi-person-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9.854-2.854a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <ul>
        <?php if ($user->getUsers()): ?>
            <a class="nav-link nav-item" href="/logout">Déconnexion</a>
        <?php endif; ?>
        </ul>
        <form class="nav-item form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="search">
        </form>
    </nav>



    <br>
    <br>
<!--renvoie vers le fichier 'fichier.php' qui require le fichier 'file_upload.php' -->
    <a href="/fichier" class="create-contact">Ajouter un fichier</a>


<?php
$content = ob_get_clean();
require("template.php");

?>