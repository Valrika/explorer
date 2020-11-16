<?php
use App\Connection;

$pdo = (new Connection())->getPdo();

$title = "mon site";
$content = "content du site";
require("../template.php");

if (isset($_POST["submit"])){
    echo "Welcome";

}
else{
    header("location: ../inscription");
}