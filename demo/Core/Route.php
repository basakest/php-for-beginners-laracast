<?php

namespace Core;

class Route
{
    protected array $routes = [];

    protected function add(string $uri, string $controller, string $method): static
    {
        $middleware = null;
        $this->routes[] = compact('uri', 'controller', 'method', 'middleware');
        return $this;
    }

    public function get(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function delete(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'DELETE');
    }

    public function patch(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'PATCH');
    }

    public function put(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'PUT');
    }

    public function only(string $key): static
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                if ($route['middleware']) {
                    (new Middleware\Middleware)->resolve($route['middleware']);
                }
                return require base_path('Http/controllers/' . $route['controller']);
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
