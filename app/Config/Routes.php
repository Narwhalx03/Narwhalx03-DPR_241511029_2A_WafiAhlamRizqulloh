<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

// Arahkan halaman utama (root) ke halaman login
$routes->get('/', 'Login::index');

// Rute untuk proses Autentikasi (Admin & Public)
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

// Rute untuk Dashboard setelah login
$routes->get('/admin/dashboard', 'AdminController::index');
$routes->get('/public/dashboard', 'PublicController::index'); // Dashboard untuk role 'Public'

// Rute untuk fitur Admin (Mengelola Anggota)
// 'resource' secara otomatis membuat semua rute CRUD
$routes->resource('admin/anggota', ['controller' => 'AnggotaController', 'filter' => 'admin']);

// Komponen Gaji
$routes->resource('admin/komponengaji', ['controller' => 'KomponenGajiController', 'filter' => 'admin']);

// Penggajian
$routes->get('admin/penggajian', 'PenggajianController::index', ['filter' => 'admin']);


// Rute untuk fitur Public (Hanya Melihat Anggota)
// Kita batasi hanya untuk 'index' (melihat daftar) dan 'show' (melihat detail)
$routes->resource('public/anggota', [
    'controller' => 'AnggotaPublicController', // Gunakan controller terpisah
    'only'       => ['index', 'show'],
    'filter'     => 'auth' // Cukup pastikan sudah login
]);