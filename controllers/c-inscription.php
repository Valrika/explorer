<?php
session_start();
use App\Connection;

$pdo = (new Connection())->getPdo();

//initialisation de la variable $errors pour qu'elle soit dispo globalement
$errors = array();
$username = "";
$email = "";


// Si le user click sur le button submit
    if (isset($_POST["submit"])) {

    $username=$_POST["uid"];
    $email=$_POST["email"];
    $role=$_POST["role"];
    $pwd=$_POST["password"];
    $pwdRepeat=$_POST["pwdrepeat"];

    //Validation on s'assure que le user utilise les valeurs requise pour la validation
    if (empty($username) !== false) {
        $errors['username']="Champs nom d'utilisateur requis";

    }

    if (empty($email) !== false) {
        $errors['username']="Champs email requis";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['username']="Email adress is invalid";
    }

    if (empty($role) !== false) {
        $errors['username']="Champs role requis";
    }

    if (empty($pwd) !== false) {
        $errors['username']="Champs mot de passe requis";
    }

    if ($pwd !== $pwdRepeat) {
        $errors['username']="Les 2 mots de passe sont différents";
    }


    //Connection database pour vérifier que l'email n'est pas utiliser
    $emailQuery = "SELECT * FROM user WHERE email=? LIMIT 1";
    $stmt = $pdo->prepare($emailQuery);
    $stmt->bindParam('s', $email);
    $stmt->execute();
    $result = $stmt->fetch();
    $userCount = $result->num_rows;
    $stmt->closeCursor();

    // Si le nbre de mail similaire trouvé est supérieur à 0 alors -> error message
    if ($userCount > 0) {
        $errors['email']="Email adress is invalid";
    }

    if (count($errors) === 0){
        //encryptage du password
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $verified = false;

    $sql = "INSERT INTO user (username, email, role, password) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('s,s,s,s', $username, $email, $role, $pwd);

    if ($stmt->execute()){
        //login user ce qui veut dire ajouter les attributs du user à la session
        $user_id = $pdo->lastInsertId();
        $_SESSION['id'] =  $user_id;
        $_SESSION['username'] =  $username;
        $_SESSION['email'] =  $email;
        $_SESSION['role'] =  $role;

        //Après la connection envoie d'un message au user "flash message"
        $_SESSION['message'] = 'Vous êtes connecté, Bienvenue';
        $_SESSION['alert-class'] = "alert-succes";
        header('location: /home');
        exit();
    }else
        $errors['db8error'] = "Erreur Base de données";
    }
}

/*



    }
    /*Uid pour username

    if (invalidUid($username) !== false) {
        header('/inscription?error=invaluid');
        exit();
    }*/

   /* if (invalidEmail($email) !== false) {
        header('/inscription?error=invalidemail');
        exit();
    }

    if (pwdMatch($pwd, $pwdRepeat) !== false) {
        header('/inscription?error=passworddifférents');
        exit();
    }
//}

    /*if (uidExists($pdo, $username, $email) !== false) {
        header('/inscription?error=nondutilisateurexistedeja');
        exit();
    }

    createUser($pdo,$username, $email, $role, $pwd);

}

else
 {

    header('/inscription');exit();
}*/
