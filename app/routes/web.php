<?php
// app/routes/web.php

global $router;

$router->get('home', 'HomeController@index');
$router->get('sobre', 'SobreController@index');
$router->get('solucoes', 'SolucoesController@index');
$router->get('contato', 'ContatoController@index');
$router->get('cases', 'CasesController@index');
$router->get('blog', 'BlogController@index');
$router->get('blog/post', 'BlogController@post');
$router->get('politica-de-privacidade', 'PoliticaController@index');
$router->get('termos-de-uso', 'PoliticaController@termos');
