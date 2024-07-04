<?php
require_once 'vendor/autoload.php';  // Asegúrate de que esta línea está al principio

use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
 

function getView() {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestUri = trim($requestUri, '/');
    $baseDir = 'miapp';

    if (strpos($requestUri, $baseDir) === 0) {
        $requestUri = substr($requestUri, strlen($baseDir) + 1);
    }
    $requestUri = trim($requestUri, '/');

    $routes = [
        '' => function() { require __DIR__ . '/../views/layouts/login.php'; },
        'login' => function() { require __DIR__ . '/../views/layouts/login.php'; },
        'dashboard' => function() { require __DIR__ . '/../views/layouts/dashboard.php'; },
        'register' => function() {
            $controller = new UserController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->register();
            } else {
                require __DIR__ . '/../views/layouts/register.php';
            }
        },
        'iniciar-sesion'=>function(){
            $controller = new \App\Controllers\LoginController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
            } else {
                require __DIR__ . '/../views/layouts/login.php';
            }
            
        },
        'logout' => function() {
            $controller = new LogoutController();
            $controller->logout();
        },        
        '404' => function() { require __DIR__ . '/../views/layouts/404.php'; }
    ];

    if (isset($routes[$requestUri])) {
        $routes[$requestUri]();
    } else {
        $routes['404']();
    }
}

getView();
