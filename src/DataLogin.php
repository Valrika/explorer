<?php


namespace App;


class DataLogin extends  Connection {

    public function getUsers() {
      $pdo = "SELECT * FROM user WHERE  username = :username";
      $stmt = $this->getPdo()->query($pdo);
      while($row = $stmt->fetch()) {
        echo $row['username'] . '<br>';
      }

    }



    public function setUsersStmt($username, $password, $role) {
        $pdo = "INSERT INTO user VALUE (username, password, role)";
        $stmt = $this->getPdo()->prepare($pdo);
        $stmt->execute([$username, $password, $role]);



        }





}