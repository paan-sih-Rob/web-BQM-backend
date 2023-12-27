<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::beranda');
$routes->get('beranda', 'Home::beranda'); 
$routes->get('profile', 'Home::profile');
$routes->get('direktori', 'Home::direktori'); 
$routes->get('berita', 'Home::berita');
$routes->get('galeri', 'Home::galeri'); 
$routes->get('akademik', 'Home::akademik');
$routes->get('hubungi', 'Home::hubungi');

$routes->add('admin/logout', 'Admin\Admin::logout');

$routes->group('admin', ['filter' => 'noauth'], function ($routes) {
    $routes->add('', 'Admin\Admin::login');
    $routes->add('login', 'Admin\Admin::login');
    $routes->add('lupapassword', 'Admin\Admin::lupapassword');
    $routes->add('resetpassword', 'Admin\Admin::resetpassword');
});

$routes->group('admin', ['filter' => 'auth'], function ($routes) {
    $routes->add('sukses', 'Admin\Admin::sukses');

    $routes->add('article', 'Admin\Article::index');
    $routes->add('article/tambah', 'Admin\Article::tambah');
    $routes->add('article/edit', 'Admin\Article::edit');
    $routes->add('article/edit/(:num)', 'Admin\Article::edit/$1');

    $routes->add('page', 'Admin\Page::index');
    $routes->add('page/tambah', 'Admin\Page::tambah');
    $routes->add('page/edit', 'Admin\Page::edit');
    $routes->add('page/edit/(:any)', 'Admin\Page::index/$1');

    $routes->add('socials', 'Admin\Socials::index');

    $routes->add('akun', 'Admin\Akun::index');
});


$routes->add('page/(:any)', 'Page::index\$1');