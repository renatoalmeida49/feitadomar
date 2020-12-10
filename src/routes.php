<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->get('/produtos', 'ProdutosController@index');


$router->get('/login', 'LoginController@index');
$router->get('/logoff', 'LoginController@logoff');
$router->post('/singup', 'LoginController@singup');
$router->post('/login', 'LoginController@login');