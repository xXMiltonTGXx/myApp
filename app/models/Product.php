<?php
namespace App\Models;
use PDO;


class Product {
    private $conn;
    private $table_name = "product";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function register($name, $amount, $price) {
        $query = "INSERT INTO product ( name, amount, price) VALUES (:name, :amount, :price)";
        $stmt = $this->conn->prepare($query);
     
     
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':price', $price); 
    
        if($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } 
    
    public function getAllProducts() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    

    public function getProductById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM product WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $amount, $price) {
        $stmt = $this->conn->prepare("UPDATE product SET name = :name, amount = :amount, price = :price WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':price', $price);
        return $stmt->execute();
    }

    public function searchProductsByName($name) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE name LIKE :name";
        $stmt = $this->conn->prepare($query);
        $name = "%" . $name . "%"; // Preparar el nombre para una búsqueda parcial
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
