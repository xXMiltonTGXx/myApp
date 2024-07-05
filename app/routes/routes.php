<?php
require_once 'vendor/autoload.php';  // Asegúrate de que esta línea está al principio

use App\Controllers\UserController;
use App\Controllers\LoginController;
use App\Controllers\LogoutController;
use App\Controllers\ProductController;
 

function getView() {
    $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $requestMethod = $_SERVER['REQUEST_METHOD']; // Capturar el método HTTP
    $requestUri = trim($requestUri, '/');
    $baseDir = 'miapp';

    if (strpos($requestUri, $baseDir) === 0) {
        $requestUri = substr($requestUri, strlen($baseDir) + 1);
    }
    $requestUri = trim($requestUri, '/');

    $getRoutes = [
        '' => function() { require __DIR__ . '/../views/layouts/login.php'; },
        'login' => function() { require __DIR__ . '/../views/layouts/login.php'; },
        'dashboard' => function() { require __DIR__ . '/../views/layouts/dashboard.php'; },
        'mostrarProduct' => function() {
            $controller = new ProductController();
            $controller->showProducts();
        },
        'registerProduct' => function() { require __DIR__ . '/../views/layouts/registerProduct.php'; },
        'buscarProduct' => function() { require __DIR__ . '/../views/layouts/buscar.php'; },
        'logout' => function() {
            $controller = new LogoutController();
            $controller->logout();
        },     
        'register' => function() {
            $controller = new UserController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->register();
            } else {
                require __DIR__ . '/../views/layouts/register.php';
            }
        },
        'edit-product' => function() {
            $controller = new ProductController();
            $controller->editView($_GET['id']);
        },
        'buscarProduct' => function() {
        $controller = new ProductController();
        $controller->search();
       },
        
        
        // más rutas GET
    ];

    $postRoutes = [
        'register' => function() {
            $controller = new UserController();
            $controller->register();
        },
        'iniciar-sesion'=>function(){
            $controller = new \App\Controllers\LoginController();
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $controller->login();
            } else {
                require __DIR__ . '/../views/layouts/login.php';
            }
            
        },
        'register-producto' => function() {
            $controller = new ProductController();
            $controller->register();
        },
        'delete-product' => function() {
            $controller = new ProductController();
            $controller->delete();
        },
        'edit-product' => function() {
            $controller = new ProductController();
            $controller->editProduct();
    },
        // más rutas POST
    ];

    // Decidir cuál grupo de rutas utilizar basado en el método HTTP
    if ($requestMethod == 'GET' && isset($getRoutes[$requestUri])) {
        $getRoutes[$requestUri]();
    } elseif ($requestMethod == 'POST' && isset($postRoutes[$requestUri])) {
        $postRoutes[$requestUri]();
    } else {
        require __DIR__ . '/../views/layouts/404.php';
    }
}

getView();