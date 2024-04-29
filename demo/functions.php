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