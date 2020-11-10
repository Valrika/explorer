<?php require '../vendor/autoload.php';

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

$router = new AltoRouter();




$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();



$router->map('GET|POST', '/home', function () {
    require __DIR__ . '/../views/home.php';
});

$match = $router->match();
$match["target"]();

?>