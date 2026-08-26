<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Public Storefront Routes
$routes->get('/', 'Pages::index');
$routes->get('/product', 'Pages::product');

// Public Admin Auth Routes
$routes->get('admin', 'Admin\AuthController::login');
$routes->get('admin/login', 'Admin\AuthController::login');
$routes->post('admin/login', 'Admin\AuthController::authenticate');
$routes->get('admin/logout', 'Admin\AuthController::logout');

// Protected Admin CMS Routes
$routes->group('admin', ['filter' => 'adminAuth'], static function ($routes) {
    $routes->get('dashboard', 'Admin\DashboardController::index');
    $routes->post('store/update', 'Admin\DashboardController::updateStoreInfo');

    // Products Management
    $routes->get('products', 'Admin\ProductController::index');
    $routes->post('products/save', 'Admin\ProductController::save');
    $routes->post('products/update/(:num)', 'Admin\ProductController::update/$1');
    $routes->get('products/toggle-best/(:num)', 'Admin\ProductController::toggleBestSeller/$1');
    $routes->get('products/delete/(:num)', 'Admin\ProductController::delete/$1');

    // Testimonials Management
    $routes->get('testimonials', 'Admin\TestimonialController::index');
    $routes->post('testimonials/save', 'Admin\TestimonialController::save');
    $routes->post('testimonials/update/(:num)', 'Admin\TestimonialController::update/$1');
    $routes->get('testimonials/delete/(:num)', 'Admin\TestimonialController::delete/$1');
});