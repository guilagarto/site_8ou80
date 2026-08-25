<?php
// app/core/Router.php

class Router
{
    private array $routes = [];

    /**
     * Registra uma rota do tipo GET no sistema
     */
    public function get(string $url, string $handler): void
    {
        $this->routes[$url] = $handler;
    }

    /**
     * Processa a URL atual, valida a existência dos arquivos e executa a ação
     */
    public function dispatch(): void
    {
        // Captura a URL amigável atual do Apache ou define 'home' como padrão
        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';

        // 🛡️ TRATAMENTO DO ERRO 404: Rota não cadastrada no arquivo web.php
        if (!isset($this->routes[$url])) {
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        // Transforma a string "HomeController@index" em um array separando pelo "@"
        $parts = explode('@', $this->routes[$url]);
        $controllerName = $parts[0];
        $action = $parts[1];

        $controllerPath = __DIR__ . '/../controllers/' . $controllerName . '.php';

        // 🛡️ TRATAMENTO DO ERRO 404: O arquivo físico do controlador não foi encontrado
        if (!file_exists($controllerPath)) {
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        require_once $controllerPath;
        $controller = new $controllerName();

        // 🛡️ TRATAMENTO DO ERRO 404: O método/função solicitado não existe dentro da Controller
        if (!method_exists($controller, $action)) {
            http_response_code(404);
            require_once __DIR__ . '/../views/404.php';
            return;
        }

        // Executa dinamicamente a ação correspondente
        $controller->$action();
    }
}
