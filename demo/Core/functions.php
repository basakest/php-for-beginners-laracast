<?php

use Core\Response;

function dd(mixed $value): void
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function uriIs(string $uri): bool
{
    return $_SERVER['REQUEST_URI'] === $uri;
}

function authorize(bool $condition, $code = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($code);
    }
}

function abort(int $code = 404): void
{
    http_response_code($code);
    require base_path("views/{$code}.php");
    die();
}

function base_path(string $path): string
{
    return BASE_PATH . $path;
}

function view(string $path, array $data = []): void
{
    // dd($heading);
    extract($data);
    require base_path('views/' . $path);
}

function login(array $user): void
{
    $_SESSION['user']['email'] = $user['email'];
    session_regenerate_id(true);
}

function logout(): void
{
    $_SESSION = [];
    session_destroy();
    $params = session_get_cookie_params();
    setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
}
