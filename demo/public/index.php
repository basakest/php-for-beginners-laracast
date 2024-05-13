<?php

use Core\Route;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'Core/functions.php';

spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path($class . '.php');
});

session_start();

require base_path('bootstrap.php');

$route = new Route();
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

require base_path('routes.php');
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$route->route($uri, $method);
