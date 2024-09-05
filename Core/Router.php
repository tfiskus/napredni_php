<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function add(string $uri, array $action, string $method)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $action[0],
            'function' => $action[1]
        ];
    }

    public function get(string $uri, array $action)
    {
        $this->add($uri, $action, 'GET');
    }

    public function post(string $uri, array $action)
    {
        $this->add($uri, $action, 'POST');
    }

    public function put(string $uri, array $action)
    {
        $this->add($uri, $action, 'PUT');
    }

    public function patch(string $uri, array $action)
    {
        $this->add($uri, $action, 'PATCH');
    }

    public function delete(string $uri, array $action)
    {
        $this->add($uri, $action, 'DELETE');
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
                $classPath = $route['controller'];
                $function = $route['function'];

                $controller = new $classPath();
                $controller->$function();
                exit();
            }
        }
        
       abort();
    }
}