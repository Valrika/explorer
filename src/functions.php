<?php
use App\Connection;
$pdo=(new Connection())->getPdo();

function adminConnected($variable){
    $sth=$pdo->prepare('SELECT user.username, user.password, user.role_id FROM user WHERE role_id = "admin"');
    $sth->bindParam(':username', $username);
    $sth->execute(['username'=>$username, 'password'=>$password]);
    $result=$sth->fetch();
    // Si elles correspondent le user est dirigé vers home_user
    if ($result == true){

    }
}







