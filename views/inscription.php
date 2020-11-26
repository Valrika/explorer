<?php
session_

        /*if (empty($username) || empty($email) || empty($password)) {
            $status="Tous les champs sont requis";
        } else {
            if (strlen($username) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $username)) {
                $status="Entrez un identifiant valide svp";
            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $status="Entrez un email valid svp";
            }
        }*/

}
?>

<!DOCTYPE html>
<html lang="fr">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="assets/icon/style.css" />
<head>
    <meta charset="UTF-8">
    <!-- Boostrap css -->

    <title>Inscription</title>
</head>

<body>

<div class="container w-50 h-50">
    <form action="" method="POST">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label for="text">Identifiant</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="entrez votre identifiant" placeholder="Identifiant">
                        </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                </div>
                        <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe">
                </div>
                <button type="submit" name="submit" class="btn btn-info">Se connecter</button>

                <div class="form-status">

                </div>
            </div>
        </div>
    </form>
</div>



</body>
</html>