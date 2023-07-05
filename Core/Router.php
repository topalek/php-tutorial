<?php

namespace Core;
use Core\Middleware\Middleware;

class Router
{
    private $routes = [];

    private function add($method, $uri, $controller): self
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => $method,
            'middleware' => null,
        ];
        return $this;
    }

    public function get($uri, $controller): self
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): self
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): self
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): self
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller): self
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                if ($route['middleware']) {
                    $middleware = Middleware::MAP[$route['middleware']];
                    (new $middleware())->handle();
                }


                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort($statusCode = 404)
    {
        http_response_code($statusCode);
        view("error", [
            'statusCode' => $statusCode
        ]);
        die;
    }

}