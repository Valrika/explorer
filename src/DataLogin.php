<?php


namespace App;


class DataLogin extends  Connection {
//Function qui permet la récupération des infos du user pour pouvoir les utiliser dans la session
    public function getUsers() {
        //Récupération de $username dans la session
        $username = $_SESSION["username"];
        //Connection à la bdd
        $pdo = (new Connection())->getPdo();
        //Requête pour récupération des infos du user
        $query = $pdo->prepare("SELECT * FROM user WHERE username = '$username'");
        $query->execute();
        $user = $query->fetch();
        return $user;
    }


    public function setUsersStmt($username, $password, $role) {
        $pdo = "INSERT INTO user VALUE (username, password, role)";
        $stmt = $this->getPdo()->prepare($pdo);
        $stmt->execute([$username, $password, $role]);
    }

}