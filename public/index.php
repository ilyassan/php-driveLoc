<?php    
    require_once __DIR__ . '/../app/Config/config.php';

    // Define the routes
    $router = new Router();
    $request = new Request();

    $router->add('GET', '/', 'LoginPage@index');

    $router->dispatch($request);