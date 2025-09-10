<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/* Livro */
$routes->get('/livro', 'Livro::index');
$routes->get('/livro/cadastrar', 'Livro::cadastrar');
$routes->get('/livro/editar/(:num)', 'Livro::editar/$1');
$routes->post('/livro/salvar', 'Livro::salvar');
$routes->delete('/livro/deletar', 'Livro::excluir');

/* Autor */
$routes->get('/autor', 'Autor::index');
$routes->get('/autor/cadastrar', 'Autor::cadastrar');
$routes->get('/autor/editar/(:num)', 'Autor::editar/$1');
$routes->post('/autor/salvar', 'Autor::salvar');
$routes->delete('/autor/deletar', 'Autor::excluir');

/* Assunto */
$routes->get('/assunto', 'Assunto::index');
$routes->get('/assunto/cadastrar', 'Assunto::cadastrar');
$routes->get('/assunto/editar/(:num)', 'Assunto::editar/$1');
$routes->post('/assunto/salvar', 'Assunto::salvar');
$routes->delete('/assunto/deletar', 'Assunto::excluir');