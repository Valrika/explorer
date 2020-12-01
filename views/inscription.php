<?php use App\Connection;

    $pdo = (new Connection())->getPdo();

    $title = "mon site";
    ob_start();
    session_start();

    $title="Explorateur de fichier Valrika";

if (!empty($_POST)){

    $errors = array();

    if (empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
        $errors['username'] = "Vrotre pseudo n'est pas valide (alphanumérique)";
    }else {
        $req=$pdo->prepare("SELECT id FROM user WHERE username = ?");
        $req->execute([$_POST['username']]);
        $user=$req->fetch();
        if ($user) {
            $errors['username']='Ce pseudo est déjà pris';
        }

        if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email']="votre email n'est pas valide";

        } else {
            $req=$pdo->prepare("SELECT id FROM user WHERE email = ?");
            $req->execute([$_POST['email']]);
            $user=$req->fetch();
            if ($user) {
                $errors['email']='Cet email  est déjà utilisé sur un autre compte';
            }

            if (empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']) {
                $errors['password'];
            }

            if (empty($errors)) {
                $req=$pdo->prepare("INSERT INTO user SET username = ?, password = ?, email = ?, confirmation_token = ?");

                header('location: /home_user');
                /*$password=password_hash($_POST['password'], PASSWORD_BCRYPT);
                $token = str_random(60);
                $req->execute([$_POST['username'], $password, $_POST['email'], $token]);
                $user_id =$pdo->lastInsertId();
                mail($_POST['email'], 'Confirmation de votre compte', "Afin de valider votre compte merci de cliquer sur ce lien\n\nhttp://127.0.0.1:8080/confirm?id=$user_id$token=$token");
                header('Location: /home_user');
                exit();*/
            }
        }

    }

}

    if(!empty($errors)): ?>

    <div class="alert alert-danger">
        <p>Vous n'avez pas rempli le formulaire correctement</p>
        <ul>
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
            <input type="text" name="name" class="Name" placeholder="nom ou pseudonyme">

            <label for="email">Email</label>
            <small id="email" class="form-text text-muted">Nous ne vendrons jamais vos données :)</small>
            <input type="text" name="email" class="Email" placeholder="email">


            <label for="password">Mot de passe</label>
            <input type="password" name="password" class="Address" placeholder="mot de passe">

            <!--
            <label for="passwordConfirm">Confirmez votre mot de passe</label>
            <input type="password" name="password" class="Address" placeholder="confirmer le mot de passe">

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
    require("template.php");
?>