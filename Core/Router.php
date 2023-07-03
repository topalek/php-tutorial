<?php

namespace Core;
class Router
{
    private $routes = [];

    public function get($uri, $controller)
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'GET',
        ];
    }

    public function post($uri, $controller)
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'POST',
        ];
    }

    public function delete($uri, $controller)
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'DELETE',
        ];
    }

    public function patch($uri, $controller)
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'PATCH',
        ];
    }

    public function put($uri, $controller)
    {
        $this->routes[] = [
            'uri'        => $uri,
            'controller' => $controller,
            'method'     => 'PUT',
        ];
    }

    public function route($uri)
    {

    }

}


function isRoute($route): bool
{
    return parse_url($_SERVER['REQUEST_URI'])['path'] === $route;
}

function abort($statusCode = 404)
{
    http_response_code($statusCode);
    view("error", [
        'statusCode' => $statusCode
    ]);
    die;
}

function routeToController($uri, $routes)
{
    if (array_key_exists($uri, $routes)) {
        require base_path($routes[$uri]);
    } else {
        abort();
    }
}



routeToController($path, $routes);