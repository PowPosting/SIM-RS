<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Default route
$routes->get('/', 'Auth::login');

// Authentication Routes
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');
$routes->get('profile', 'Auth::profile');
$routes->post('profile/update', 'Auth::updateProfile');

// Dashboard
$routes->get('dashboard', 'Dashboard::index');

// Role-based Routes

// Admin Routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('dashboard', 'Admin::index');
    $routes->get('users', 'Admin::users');
    $routes->get('users/add', 'Admin::addUser');
    $routes->post('users/save', 'Admin::saveUser');
    $routes->get('users/edit/(:num)', 'Admin::editUser/$1');
    $routes->post('users/update/(:num)', 'Admin::updateUser/$1');
    $routes->get('users/delete/(:num)', 'Admin::deleteUser/$1');
    $routes->post('users/toggle-status/(:num)', 'Admin::toggleUserStatus/$1');
    $routes->get('database', 'Admin::database');
});

// Farmasi Routes
$routes->group('farmasi', function($routes) {
    $routes->get('/', 'Farmasi::index');
    $routes->get('dashboard', 'Farmasi::index');
    $routes->get('prescriptions', 'Farmasi::prescriptions');
    $routes->get('medicine-stock', 'Farmasi::medicineStock');
    $routes->get('reports', 'Farmasi::reports');
});

// Kasir Routes
$routes->group('kasir', function($routes) {
    $routes->get('/', 'Kasir::index');
    $routes->get('dashboard', 'Kasir::index');
    $routes->get('payments', 'Kasir::payments');
    $routes->get('billing', 'Kasir::billing');
    $routes->get('reports', 'Kasir::reports');
});

// Dokter Routes
$routes->group('dokter', function($routes) {
    $routes->get('/', 'Dokter::index');
    $routes->get('dashboard', 'Dokter::index');
    $routes->get('schedule', 'Dokter::schedule');
    $routes->get('patients', 'Dokter::patients');
});

// Perawat Routes
$routes->group('perawat', function($routes) {
    $routes->get('/', 'Perawat::index');
    $routes->get('dashboard', 'Perawat::index');
    $routes->get('patients', 'Perawat::patients');
    $routes->get('patient-care', 'Perawat::patientCare');
    $routes->get('schedule', 'Perawat::schedule');
});

// Admisi Routes
$routes->group('admisi', function($routes) {
    $routes->get('/', 'Admisi::index');
    $routes->get('dashboard', 'Admisi::index');
    $routes->get('registrasipasien', 'Admisi::registrasipasien');
    $routes->get('registrasi-pasien', 'Admisi::registrasipasien');
    $routes->post('registrasipasien/save', 'Admisi::saveStep1');
    $routes->get('registrasipasien/step2', 'Admisi::registrasipasienStep2');
    $routes->post('registrasipasien/step2/save', 'Admisi::saveStep2');
    $routes->get('registrasipasien/step3', 'Admisi::registrasipasienStep3');
    $routes->post('registrasipasien/step3/save', 'Admisi::saveStep3');
    $routes->get('registrasipasien/step4', 'Admisi::registrasipasienStep4');
    $routes->post('registrasipasien/step4/save', 'Admisi::saveStep4');
    $routes->get('registrasipasien/step5', 'Admisi::registrasipasienStep5');
    $routes->post('registrasipasien/final-save', 'Admisi::finalSave');
    $routes->get('datapasien', 'Admisi::datapasien');
    $routes->get('get-detail-pasien/(:num)', 'Admisi::getDetailPasien/$1');
    $routes->delete('delete-pasien/(:num)', 'Admisi::deletePasien/$1');
    $routes->get('test', 'Admisi::pasienHariIni');
    $routes->get('pasien-hari-ini', 'Admisi::pasienHariIni');
});

// Manajemen Routes
$routes->group('manajemen', function($routes) {
    $routes->get('/', 'Manajemen::index');
    $routes->get('dashboard', 'Manajemen::index');
    $routes->get('reports', 'Manajemen::reports');
    $routes->get('statistics', 'Manajemen::statistics');
});


