<?php



use App\Connection;
require_once '../controllers/functions.php';
//forcer_utilisateur_connecte();

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";


?>
