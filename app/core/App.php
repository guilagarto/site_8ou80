<?php
// core/App.php

class App {
    protected $router;

    public function __construct() {
        // Carrega as configurações de rotas mapeadas em app/routes/web.php
        $routes = require_once __DIR__ . '/../app/routes/web.php';
        
        // Instancia o roteador passando as rotas
        require_once __DIR__ . '/Router.php';
        $this->router = new Router($routes);
        
        // Executa o roteamento baseado na URL acessada
        $this->run();
    }

    private function run() {
        // Captura a URL limpa enviada pelo .htaccess (padrão é 'home')
        $url = $_GET['url'] ?? 'home';
        $url = rtrim($url, '/');

        // 🔥 CORREÇÃO: Chama o método dispatch() exatamente como está no seu Router.php
        $this->router->dispatch($url);
    }
}
