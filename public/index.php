<?php require '../vendor/autoload.php';

//composers
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

//App dans connection
use App\Connection;

//Met la connexion getPdo dans une variable
$pdo = (new Connection())->getPdo();

//Composer pour les routes
$router = new AltoRouter();

// ?
$whoops = new Run;
$whoops->pushHandler(new PrettyPageHandler);
$whoops->register();


//Définit une route avec syntaxe Altorouter
$router->map('GET|POST', '/home', function () {
    require __DIR__ . '/../views/home.php';
});


$router->map('GET|POST', '/login', function () {
    require __DIR__ . '/../views/login.php';
});


$router->map('GET|POST', '/login_succes', function () {
    require __DIR__ . '/../views/login_success.php';
});


$router->map('GET|POST', '/functions', function () {
    require __DIR__ . '/../views/functions/auth.php';
});

/*/$router->map('GET|POST', '/functions', function () {
    require __DIR__ . '/../src/functions.php';
});*/

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
    require __DIR__ . '/../views/fichier.php';
});

$router->map('GET|POST', '/upload', function () {
    require __DIR__ . '/../upload/upload.php';
});

$router->map('GET|POST', '/file_upload', function () {
    require __DIR__ . '/../upload/file_upload.php';
});

$router->map('GET|POST', '/file_up', function () {
    require __DIR__ . '/../views/file_up.php';
});


$router->map('GET|POST', '/Files', function () {
    require __DIR__ . '../upload/Files';
});

$router->map('GET|POST', '/folder', function () {
    require __DIR__ . '/../upload/functions.php';
});

$router->map('GET|POST', '/documents', function () {
    require __DIR__ . '/../views/documents.php';
});

$router->map('GET|POST', '/essais', function () {
    require __DIR__ . '/../views/essais.php';
});

$router->map('GET|POST', '/home_admin', function () {
    require __DIR__ . '/../views/home_admin.php';
});

$router->map('GET|POST', '/create', function () {
    require __DIR__ . '/../upload/create.php';
});

$router->map('GET|POST', '/update', function () {
    require __DIR__ . '/../upload/update.php';
});

$router->map('GET|POST', '/delete', function () {
    require __DIR__ . '/../upload/delete.php';
});

$router->map('GET|POST', '/authen', function () {
    require __DIR__ . '/../views/functions/authen.php';
});


//match = les fonctionnalités dans Altorouter map ou match TODO
$match=$router->match();

if( is_array($match) && is_callable( $match['target'] ) ) {
    call_user_func_array( $match['target'], $match['params'] );
} else {
// no route was matched
    header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
//header = redirection vers une page, todo pourquoi server et à quoi correspond server protocol ?