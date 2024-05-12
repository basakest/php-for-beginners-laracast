<?php

namespace Core;

class Route
{
    protected array $routes = [];

    protected function add(string $uri, string $controller, string $method): void
    {
        $this->routes[] = compact('uri', 'controller', 'method');
        // $this->routes[] = [
        //     'uri'        => $uri,
        //     'controller' => $controller,
        //     'method'     => $method,
        // ];
    }

    public function get(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'DELETE');
    }

    public function patch(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PATCH');
    }

    public function put(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'PUT');
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    public function abort(int $code = 404): void
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die();
    }
}