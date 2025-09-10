<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/livro', 'Livro::index');
$routes->get('/livro/cadastrar', 'Livro::cadastrar');
$routes->get('/livro/editar/(:num)', 'Livro::editar/$1');
$routes->post('/livro/salvar', 'Livro::salvar');
$routes->delete('/livro/deletar', 'Livro::excluir');