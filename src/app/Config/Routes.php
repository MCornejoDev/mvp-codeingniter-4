<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->group('', ['filter' => 'guest'], function ($routes) {
    $routes->get('/', 'Auth::login');
    $routes->get('login', 'Auth::login');
    $routes->post('login', 'Auth::loginPost');
    $routes->get('register', 'Auth::register');
    $routes->post('register', 'Auth::registerPost');
    $routes->get('logout', 'Auth::logout');
});

$routes->group('dashboard', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Dashboard::dashboard');
    $routes->get('links', 'Dashboard::links');
    $routes->post('postLink', 'Dashboard::postLink');

    $routes->group('', ['filter' => 'admin'], function ($routes) {
        $routes->get('users', 'Dashboard::users');
    });
});
