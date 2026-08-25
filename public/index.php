<?php
// public/index.php

ini_set('display_errors', 1);
error_reporting(E_ALL);

// 1. Carrega o novo motor do roteador
require_once __DIR__ . '/../app/core/Router.php'; 

// 2. Instancia a variável no escopo global
global $router;
$router = new Router();

// 3. Inclui o mapeamento de páginas
require_once __DIR__ . '/../app/routes/web.php';

// 4. Dispara o sistema para abrir o site ou a tela de erro 404
$router->dispatch();
