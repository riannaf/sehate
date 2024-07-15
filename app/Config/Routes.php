<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('/barang', 'Barang::index');
$routes->get('/barang/data_barang', 'Barang::index');
$routes->get('/barang/form_barang', 'Barang::form');

$routes->get('/penyewa', 'Penyewa::index');
$routes->get('/penyewa/data_penyewa', 'Penyewa::index');
$routes->get('/penyewa/form_penyewa', 'Penyewa::form');

$routes->get('/sewa', 'Sewa::index');
$routes->get('/sewa/data_sewa', 'Sewa::data_sewa');
$routes->get('/sewa/form_sewa', 'Sewa::form');
