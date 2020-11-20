<?php require '../vendor/autoload.php';



use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;


$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();

$router = new AltoRouter();

$router->map('GET|POST', '/home', function () {
    require __DIR__ . '/../views/home.php';
});


$router->map('GET|POST', '/inscription', function () {
    require __DIR__ . '/../views/inscription.php';
});

$router->map('GET|POST', '/c-inscription', function () {
    require __DIR__ . '/../controllers/c-inscription.php';
});

$router->map('GET|POST', '/c-login', function () {
    require __DIR__ . '/../controllers/c-login.php';
});

$router->map('GET|POST', '/auth', function () {
    require __DIR__ . '/../src/auth.php';
});

$router->map('GET|POST', '/logout', function () {
    require __DIR__ . '/../views/logout.php';
});

$router->map('GET|POST', '/explorateur', function () {
    require __DIR__ . '/../views/explorateur.php';
});

$router->map('GET|POST', '/login', function () {
    require __DIR__ . '/../views/login.php';
});

$router->map('GET|POST', '/c-login', function () {
    require __DIR__ . '/../controllers/c-login.php';
});
$router->map('GET|POST', '/delete', function () {
    require __DIR__ . '/../src/delete.php';
});


//match current request url
$match = $router->match();


//call closure or throw 404 status
if ( is_array($match) && is_callable( $match['target'] ) ){
call_user_func_array($match['target'], $match['params']);
}

 else {
    // no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}


