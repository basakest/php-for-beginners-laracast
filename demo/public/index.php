<?php

use Core\Route;
use Core\Session;
use Core\ValidationException;

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
// 统一做表单验证处理
try {
    $route->route($uri, $method);
} catch (ValidationException $exception) {
    Session::flash('errors', $exception->errors);
    Session::flash('old', $exception->old);
    redirect($route->previousUrl());
}

Session::unflash();
