<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = require base_path('routes.php');

function abort(int $code = 404): void
{
    http_response_code($code);
    view("{$code}.php");
    die();
}

function routeToController(string $uri, array $routes): void
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}

routeToController($uri, $routes);
