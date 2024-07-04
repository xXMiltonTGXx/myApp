<?php
namespace App\Models;

use PDO;

class User {
    private $conn;
    private $table_name = "user";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($cedula, $nombre, $apellido, $email, $password) {
        $query = "INSERT INTO user (dni, name, lastname, email, password) VALUES (:dni, :name, :lastname, :email, :password)";
        $stmt = $this->conn->prepare($query);
    
        // Aquí puedes hashear la contraseña antes de guardarla
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    
        $stmt->bindParam(':dni', $cedula);
        $stmt->bindParam(':name', $nombre);
        $stmt->bindParam(':lastname', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password_hash);
    
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    
    public function login($email, $password) {
        $query = "SELECT password FROM user WHERE email = :email LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
    
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo "Hash almacenado en la BD: " . $row['password'] . "<br>";
            if (password_verify($password, $row['password'])) {
                return true;
            } else {
                echo "La verificación del hash de la contraseña falló.<br>";
                return false;
            }
        }
        
    }
    
    
}
?>
