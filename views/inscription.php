<?php

    //Connexion à la bdd
    use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "mon site";
    ob_start();
    session_start();
    $password = "";

    $title="Explorateur de fichier Valrika";

    //Première condition, l'utilisateur a rempli les champs
    if (!empty($_POST)){
        //on définit une variable erreur qui sera un array dans lequel seront stockées toutes les erreurs
        $errors = array();
        // Conditions si les champs à remplir sont vides ou contiennent des caractères spéciaux
        if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
            //Un message d'erreur apparait
            $errors['username'] = "Veuillez remplir tous les champs)";

            //On vérifie que le pseudo n'est pas déjà utilisé par un autre membre
        }else {
            //Connection à la bdd pour  vérification
            $req=$pdo->prepare("SELECT id FROM user WHERE username = ?");
            $req->execute([$_POST['username']]);
            $user=$req->fetch();
            // Si il est déjà utilisé, message d'erreur
            if ($user) {
                $errors['username']='Ce pseudo est déjà pris';
            }
            //On vérifie que l'email est conforme, valide
            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                // Si l'email n'est pas valide = message d'erreur
                $errors['email']="votre email n'est pas valide";


            } else {
                //CONNECTION à la BDD pour vérification de l'email
                $req=$pdo->prepare("SELECT id FROM user WHERE email = ?");
                $req->execute([$_POST['email']]);
                $user=$req->fetch();
                //VERIFICATION EMAIL :  email déjà enregistré dans la bdd ?
                if ($user) {
                    //Si l'email  existe déjà dans la bdd, message d'erreur
                    $errors['email']='Cet email  est déjà utilisé sur un autre compte';
                }

                //CONFIRMATION PASSWORD : On vérifie que les passwords sont bien identiques
                if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                    //Si ça n'est pas le cas = message d'erreur
                    $errors['password'];
                }
                //PAS D'ERREUR : L'utilisateur a rempli tous les champs et que tout est conforme
                if (empty($errors)) {
                    //ENREGISTREMENT de l'utilisateur dans la BDD
                    $sql=$pdo->prepare("INSERT INTO user SET username = ?, password = ?, email = ?");
                    $req = $sql;
                    $req->execute([$_POST['username'], $_POST['password'], $_POST['email']]);
                    //REDIRECTION : l'utisateur a maintenant accès à l'application
                    header('location: /home_user');

                    //CONFIRMATION ADRESSE EMAIL : l'utilisateur reçoit un lien qui lui permet de confirmer son adresse mail
                    /*$token = str_random(60);
                      $req->execute([$_POST['username'], $password, $_POST['email']]);
                      $user_id =$pdo->lastInsertId();
                      header('Location: /home_user');*/
                    exit();
                }
            }

        }

    }

    //Affichage des erreurs sur la page -> infos utilisateur
    if(!empty($errors)):
?>

    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
        <!-- Mise en place d'une boucle pour l'affichage des messages d'erreurs-->
        <?php foreach($errors as $error): ?>
                <li><?= $error ?></li>
        </ul>
        <?php endforeach; ?>
    </div>

<?php endif; ?>

    <div class="page-container">

        <form action="#" method="POST">

            <h1>Inscription</h1>

            <label for="name">Comment voulez-vous qu'on vous appelle ?</label>
            <input type="text" name="username" class="name" placeholder="nom ou pseudonyme">

            <label for="email">Email</label>
            <small id="email" class="form-text text-muted">Nous ne vendrons jamais vos données :)</small>
            <input type="text" name="email" class="Email" placeholder="email">


            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="Address" placeholder="mot de passe">


            <label for="passwordConfirm">Confirmez votre mot de passe</label>
            <input type="password" name="password_confirm" class="Address" placeholder="confirmer le mot de passe">
            <!--
                            <input class="form-check-input" type="checkbox" value="" id="check">
                            <label class="form-check-label" for="check">
                                Je ne suis pas un robot
                            </label>
                        -->

            <button class="btn btn-info btn-margin" type="submit" value="Add" name="submit">Envoyer</button>

        </form>
    </div>

<?php
    $content = ob_get_clean();
    require("template_login.php");
?>