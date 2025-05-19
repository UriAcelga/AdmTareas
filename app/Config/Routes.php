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

$routes->get('aceptarNotif', 'NotificacionController::aceptar');
$routes->get('rechazarNotif', 'NotificacionController::rechazar');

$routes->post('crearTarea', 'TareaController::crear');
$routes->post('modificarTarea', 'TareaController::modificar');
$routes->post('borrarTarea', 'TareaController::borrar');

$routes->post('crearSubtarea', 'SubtareaController::crear');
$routes->post('modificarSubtarea', 'SubtareaController::modificar');
$routes->post('borrarSubtarea', 'SubtareaController::borrar');
$routes->post('desarrollarSubtarea', 'SubtareaController::desarrollar');
$routes->post('completarSubtarea', 'SubtareaController::completar');
$routes->post('subtareaAlBacklog', 'SubtareaController::al_backlog');

$routes->post('invitarColaborador', 'NotificacionController::invitar');