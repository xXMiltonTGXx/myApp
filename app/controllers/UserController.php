<?php
namespace App\Controllers;
use App\Models\User;
use App\Config\Database;
use \PDO;

class UserController {
    private $userModel;

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->userModel = new User($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cedula = $_POST['dni'];
            $nombre = $_POST['name'];
            $apellido = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if ($this->userModel->register($cedula, $nombre, $apellido, $email, $password)) {
                header("Location: /miapp/dashboard"); // Cambia según tu ruta de éxito
                exit;
            } else {
                echo "<div class='alert alert-danger'>No se pudo registrar al usuario.</div>";
            }
        }
    }


    
    
}
