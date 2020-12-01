<?php require '../vendor/autoload.php';

use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;
use App\Connection;

$pdo = (new Connection())->getPdo();

$router = new AltoRouter();



$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$router->map('GET|POST', '/home', function () {
    require __DIR__ . '/../views/home.php';
});


$router->map('GET|POST', '/login', function () {
    require __DIR__ . '/../views/login.php';
});

$router->map('GET|POST', '/auth', function () {
    require __DIR__ . '/../src/auth.php';
});

$router->map('GET|POST', '/inscription', function () {
    require __DIR__ . '/../views/inscription.php';
});


$router->map('GET|POST', '/logout', function () {
    require __DIR__ . '/../views/logout.php';
});

$router->map('GET|POST', '/template', function () {
    require __DIR__ . '/../views/template.php';
});

$router->map('GET|POST', '/fichier', function () {
    require __DIR__ . '/../views/fichier.html';
});

$router->map('GET|POST', '/upload', function () {
    require __DIR__ . '/../upload/upload.php';
});

$router->map('GET|POST', '/folder', function () {
    require __DIR__ . '/../upload/folder.php';
});

$router->map('GET|POST', '/documents', function () {
    require __DIR__ . '/../views/documents.php';
});


$match=$router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
// no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}