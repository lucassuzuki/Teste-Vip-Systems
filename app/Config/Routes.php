<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->post('/login', 'Usuario::login');
$routes->post('/logout', 'Usuario::logout');
$routes->post('/validacao', 'Validacao::segundaValidacao');
