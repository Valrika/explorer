<?php
use App\Connection;
$pdo=(new Connection())->getPdo();


//remplacée par une condition
 function isAdmin($user_id) {
     global $pdo;
     $sql = "SELECT * FROM user WHERE id = ? AND role_id = 1";
     $user =  [$user_id];
     if (!empty($user)){
         return true;
     }else{
         return false;
     }

 }






