<?php 

//dans le fichier public le serveur pointe sur ce fichier

require '../vendor/autoload.php';

$router = new AltoRouter();

dd($router);

$router->map(method'GET', route'/home', function() {
    require __DIR__ , '/../views/base.php';
});

$match = $router->match();

dd($match);
$match['target']();

?>