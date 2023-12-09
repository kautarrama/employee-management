<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Employees::index');
$routes->get('/new', 'Employees::new');
$routes->post('/create', 'Employees::create');
$routes->get('/edit/(:num)', 'Employees::edit/$1');
$routes->put('/update/(:num)', 'Employees::update/$1');
$routes->get('/delete/(:num)', 'Employees::delete/$1');
