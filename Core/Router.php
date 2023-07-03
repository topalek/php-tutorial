<?php

namespace Core;
class Router
{
    private $routes = [];

    private function add($method, $uri, $controller): void
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => $method,
        ];
    }

    public function get($uri, $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function patch($uri, $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put($uri, $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
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