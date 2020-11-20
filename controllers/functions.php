<?php




/*function emptyInputInscription($username, $email, $role, $pwd, $pwdRepeat) {
    $result;
        if (empty(($username) || empty($email) || empty($role) || empty($pwd) || empty($pwdRepeat))) {
        $result = true;
}

    else {
        $result = false;
    }
    return $result;
}

function invalidUid($username) {
    $result;
    if (!preg_match("subject: [a-zA-Z0-9]*), $username")) {

        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function invalidEmail($email) {
    $result;
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat) {
    $result;

    if ($pwd !== $pwdRepeat) {

        $result = true;
    }

    else {
        $result = false;
    }
    return $result;
}

/*function uidExists($pdo, $username, $email) {
    $pdo =  "SELECT * FROM user WHERE  username = ? OR email = ? LIMIT 1";
    $stmt = $pdo->prepare($pdo);
    if (mysqli_stmt_prepare($stmt, $pdo)) {

        header('/inscription?error=stmtfailed');
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ss");

}*/

