<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$url = isset($_GET['url']) ? $_GET['url'] : 'home';
$url = rtrim($url, '/');

if ($url === '') {
    $url = 'home';
}

$routes = require_once __DIR__ . '/../app/routes/web.php';

require_once __DIR__ . '/../app/core/Router.php';

$router = new Router($routes);

$router->dispatch($url);