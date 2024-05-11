<?php

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
