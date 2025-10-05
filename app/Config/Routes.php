<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('article', 'ArticleController::indexAsc');
$routes->get('article/(:num)', 'ArticleController::show/$1');
$routes->get('season', 'SeasonController::index');
$routes->get('season/(:num)', 'SeasonController::competitions/$1');
$routes->get('season/(:num)/competition/(:num)', 'SeasonController::games/$1/$2');
$routes->get('season/(:num)/games', 'SeasonController::seasonGames/$1');
$routes->get('game/(:num)', 'SeasonController::gameDetail/$1');
$routes->get('team/(:num)', 'SeasonController::team/$1');
$routes->get('admin', 'AdminController::index');
$routes->get('admin/create', 'AdminController::create');
$routes->post('admin/store', 'AdminController::store');
$routes->get('admin/edit/(:num)', 'AdminController::edit/$1');
$routes->post('admin/update/(:num)', 'AdminController::update/$1');
$routes->get('admin/delete/(:num)', 'AdminController::delete/$1');
$routes->post('admin/toggle-published', 'AdminController::togglePublished');
$routes->post('admin/toggle-top', 'AdminController::toggleTop');
$routes->get('admin/login', 'AdminController::login');
$routes->post('admin/login', 'AdminController::doLogin');
$routes->get('admin/logout', 'AdminController::logout');