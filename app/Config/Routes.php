<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::index');
$routes->post('auth', 'Auth::login');
$routes->get('registro', 'Auth::registro');
$routes->post('registrar', 'Auth::registrar_usuario');
$routes->get('logout', 'Auth::logout');
$routes->get('home', 'HomeController::index');
$routes->get('tareas/(:num)', 'TareaController::index/$1');
