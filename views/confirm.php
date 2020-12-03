<?php
$user_id = $_GET['id'];
$token = $_GET['token'];

use App\Connection;
$pdo = (new Connection())->getPdo();

$req = $pdo->prepare('SELECT token FROM user WHERE id = ?');
$req->execute([$user_id]);
$user = $req->fetch();

if($user && $suer->token == $token){
    die('ok');

}else{

    die('pas ok');
}