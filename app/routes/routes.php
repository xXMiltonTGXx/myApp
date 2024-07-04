<?php 

require_once __DIR__ . '/config/app.php';
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/app/views/inc/session_start.php';
 
$routes = [
    '' => 'login',
    'dashboard' => 'dashboard',
];

// Obtiene la ruta solicitada
$requestUri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$requestUri = str_replace('miapp/', '', $requestUri);

// Verifica si la ruta existe en el array de rutas
if (array_key_exists($requestUri, $routes)) {
    $view = $routes[$requestUri];
} else {
    $view = '404';
}

// Renderiza la vista correspondiente
require_once __DIR__ . '/app/views/content/' . $view . '-view.php';
