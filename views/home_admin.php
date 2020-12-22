<?php

//renommer en documents ?
    require_once '../views/functions/authen.php';

    forcer_utilisateur_connecte();

    include_once '../upload/delete.php';

    //classes
    use App\Connection;
    use App\Model\User;
    use App\DataLogin;


    $user = new DataLogin();

    //TODO Instancie la fonction getUser ?
    $role = $user->getUsers()['role_id'];

    $pdo = (new Connection())->getPdo();

    $title = "Bienvenue";
    ob_start();

    // Récupérer la page via la requête GET (URL param: page), if non exists default the page to 1

    //TODO comprendre ça
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;

    // Définir le nombre de fichiers enregistrés sur une page
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

    <!--Sert à l'affichage de quelque chose, code CSS, ici on intègre fontawsome pour les icônes plus bas-->
    <script src="https://kit.fontawesome.com/31cfd28a45.js" crossorigin="anonymous"></script>


        <!--Condition qui permet l'affichage du username du user si celui-ci est connecté-->

       <?php
           if (isset($_SESSION['username'])) {
               // Accueil personnalisé quand le user arrive sur la page
               echo "Bonjour ".$_SESSION['username'];
           }
       ?>

        <h2>Tous vos fichiers</h2>

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

                                <!-- Autorisation - Condition qui permet l'accès au bouton de modif sur le fichier par l'admin
                                le user n'y a pas accès-->
                                <!-- icônes update, print et delete avec fontawsome -->
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

        <!-- Mise en page des données sur le template à savoir nombre de fichiers par page
         balise i = texte ou contenu mis à part dans du texte-->
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="/home_admin?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
                <?php endif; ?>
                <?php if ($page*$records_per_page < $num_files): ?>
                    <a href="/home_admin?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
                <?php endif; ?>
            </div>
        </div>

    <!--renvoie vers le fichier 'fichier.php' qui require le fichier 'file_upload.php' -->
        <a href="/fichier" class="create-contact">Ajouter un fichier</a>

<?php

    $content = ob_get_clean();
    require("template.php");

?>