<?php

namespace App\Controllers;

use App\Models\User;
use App\Config\Database;

class LoginController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function login() {
        session_start();
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if ($this->userModel->login($email, $password)) {
                $_SESSION['logged_in'] = true;  // Establece una variable de sesión que indica que el usuario está logueado.
                $_SESSION['user_email'] = $email;
                header("Location: /miapp/dashboard");
                exit;
            } else {
                echo "<div class='alert alert-danger'>Email o contraseña incorrectos.</div>";
                require __DIR__ . '/../views/layouts/login.php';
            }
        }
    }
}
