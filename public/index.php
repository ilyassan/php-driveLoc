<?php    
    require_once __DIR__ . '/../app/Config/config.php';

    function require_all_files($directory) {
        foreach (glob($directory . '/*.php') as $filename) {
            require_once $filename;
        }
    }

    // Require all core files
    require_all_files(__DIR__ . '/../app/Core');
    $db = new Database();
    BaseClass::setDatabase($db);

    require_all_files(__DIR__ . '/../app/Classes');


    require_once __DIR__ . '/../app/Helpers/url_helper.php';
    require_once __DIR__ . '/../app/Helpers/session_helper.php';
    require_once __DIR__ . '/../app/Helpers/custom_functions.php';

    // Define the routes
    $router = new Router();
    $request = new Request();

    $router->add('GET', '/signup', 'SignupPage@index');
    $router->add('POST', '/signup', 'SignupPage@signup');
    $router->add('GET', '/login', 'LoginPage@index');
    $router->add('POST', '/login', 'LoginPage@login');

    $router->dispatch($request);