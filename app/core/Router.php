<?php

class Router
{
    private array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function dispatch(string $url): void
    {
        if (!isset($this->routes[$url])) {
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        $controllerName = $this->routes[$url]['controller'];
        $action = $this->routes[$url]['acao'];

        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        if (!file_exists($controllerPath)) {
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        require_once $controllerPath;

        $controller = new $controllerName();

        if (!method_exists($controller, $action)) {
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        $controller->$action();
    }
}