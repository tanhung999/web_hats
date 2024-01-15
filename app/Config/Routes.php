<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\AuthController;
use App\Controllers\AdminController;
use App\Controllers\UsersController;
/**
 * @var RouteCollection $routes
 */

    $routes->get('/','ProductsController::index');
    $routes->get('admin','AdminController::index');
    $routes->get('register', 'AuthController::register');
    $routes->get('login', 'AuthController::login');
    $routes->get('logout','AuthController::logout');
    $routes->get('admin/category','CategoriesController::index');
    $routes->get('admin/profile','UsersController::profile');
    $routes->get('admin/customer','UsersController::index');
    $routes->get('admin/product','ProductsController::index');
    $routes->get('admin/order','OrdersController::index');
    $routes->get('admin/category/edit/(:num)', 'CategoriesController::editCategory/$1');
    $routes->get('admin/product/edit/(:num)', 'ProductsController::editProduct/$1');
    $routes->get('admin/order_detail/(:num)','OrdersController::orderDetail/$1');
    $routes->post('atc_login', 'AuthController::processLogin');
    $routes->post('atc_register', 'AuthController::processRegister');
    $routes->post('update-avatar', 'UsersController::updateAvatar');
    $routes->post('admin/category/update', 'CategoriesController::updateCategory');
    $routes->post('admin/product/update', 'ProductsController::updateProduct');


