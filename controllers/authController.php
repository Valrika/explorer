<?php

use App\Connection;

$pdo = (new Connection())->getPdo();

$errors = array();
$username = "";
$email = "";

// Si l'utilisateur click sur le bouton inscription

if (isset($_POST['signup-btn'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConf = $_POST['passwordConf'];

    // Validation

    if (empty($username)) {
        $errors['username'] = "Veuillez entrer le nom d'utilisateur";

    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Adresse email invalide";

    }
    if (empty($email)) {
        $errors['email'] = "Veuillez entrer votre email";
    }

    if (empty($password)) {
        $errors['password'] = "Veuillez entrer votre mot de passe";
    }

    if (empty($password !== $passwordConf)) {
        $errors['password'] = "Les deux mots de passe sont différents";
    }


    $emailQuery = "SELECT * FROM user WHERE  email=? LIMIT 1";
    $stmt = $pdo->prepare($emailQuery);
    $stmt->bindParam('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_row;
    $stmt->closeCursor();}

    /*if (count($errors) === 0) {

        $password = password_hash($password,PASSWORD_DEFAULT);
        $token =bin2hex(random_bytes(50));
        $verified =false;

        $pdo = "INSERT INTO user (username, verified, id, password, role, email, token) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($pdo);
        $stmt->bindParam('sbbssss', $username, $verified, $id, $password, $role, $email, $token);
        $stmt->execute();
    }


}