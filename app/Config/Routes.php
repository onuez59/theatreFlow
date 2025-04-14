<?php

use CodeIgniter\Router\RouteCollection;

$routes->group('', function ($routes) {
    $routes->get('/', 'Home::index');
    $routes->get('comprar/(:num)', 'Cobras::comprar/$1');
    $routes->post('procesar-compra', 'Cventas::procesarCompra');
    $routes->get('confirmacion/(:num)', 'Cventas::confirmacion/$1');
});

$routes->set404Override(function () {
    return view('errors/html/error_404', [
        'title' => 'Página no encontrada | Theatre Flow',
        'message' => 'La página que buscas no existe o ha sido movida'
    ]);
});
