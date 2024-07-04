<?php
function getView() {
    $path = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    $path = substr($path, strlen('myapp')); // Asegúrate de quitar el subdirectorio
    $path = trim($path, '/');

    $routes = [
        '' => 'login.php',  // Ruta por defecto
        'login' => 'login.php',
        'dashboard' => 'dashboard.php'
    ];

    return $routes[$path] ?? '404.php'; // Devuelve 404 si la ruta no existe
}

$view = getView();
?>
