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

if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>