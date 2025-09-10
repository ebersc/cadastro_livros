<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/livro', 'Livro::index');
$routes->get('/livro/cadastrar', 'Livro::cadastrar');
$routes->get('/livro/editar/$1', 'Livro::editar');
