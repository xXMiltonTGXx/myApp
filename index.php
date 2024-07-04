<?php
require_once 'vendor/autoload.php'; 
require_once 'app/config/app.php';         
require_once 'app/views/inc/session_start.php';
require_once 'app/routes/routes.php';

?>
<!DOCTYPE html>
<html lang="es">
<head> 
    <?php require_once 'app/views/inc/head.php'; ?>
</head>
<body>
    <?php include "app/views/layouts/{$view}"; ?>
</body>
</html>
