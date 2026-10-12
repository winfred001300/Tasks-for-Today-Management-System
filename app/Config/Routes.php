<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Public routes
$routes->get('/', 'Home::index');
$routes->get('home/view', 'Pages::landing');
$routes->get('about', 'Pages::about');

// Profile route
$routes->get('profile', 'Pages::profile');

// Authentication routes
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');

// Task List route
$routes->get('tasks', 'Tasks::index');

// Task management routes - login required
$routes->get('tasks/new', 'Tasks::new', ['filter' => 'auth']);
$routes->post('tasks/create', 'Tasks::create', ['filter' => 'auth']);

// Edit and update task routes - login required
$routes->get('tasks/edit/(:num)', 'Tasks::edit/$1', ['filter' => 'auth']);
$routes->post('tasks/update/(:num)', 'Tasks::update/$1', ['filter' => 'auth']);

// Archive task route - login required
$routes->post('tasks/archive/(:num)', 'Tasks::archive/$1', ['filter' => 'auth']);

// Protected Customer Accounts routes (existing POS routes)
$routes->group('customers', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Customers::index');
    $routes->get('new', 'Customers::new');
    $routes->post('create', 'Customers::create');

    $routes->get('edit/(:num)', 'Customers::edit/$1');
    $routes->post('update/(:num)', 'Customers::update/$1');
});

// Protected User Accounts routes (existing POS routes)
$routes->group('users', ['filter' => 'auth'], static function ($routes) {
    $routes->get('/', 'Users::index');
    $routes->get('new', 'Users::new');
    $routes->post('create', 'Users::create');

    $routes->get('edit/(:num)', 'Users::edit/$1');
    $routes->post('update/(:num)', 'Users::update/$1');
});
