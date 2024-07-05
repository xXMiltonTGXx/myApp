<?php
namespace App\Controllers; 
use App\Config\Database; 
use App\Models\Product;   




class ProductController {
    private $productModel; 

    public function __construct() {
        $database = new Database();
        $db = $database->getConnection();
        $this->productModel = new Product($db);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
            $name = $_POST['name'];
            $amount = $_POST['amount'];
            $price = $_POST['price']; 
    
            if ($this->productModel->register($name, $amount, $price)) {
                header("Location: /miapp/mostrarProduct"); // Cambia según tu ruta de éxito
                exit;
            } else {
                echo "<div class='alert alert-danger'>No se pudo registrar al usuario.</div>";
            }
        }
    }

    public function showProducts() {
        $products = $this->productModel->getAllProducts();
        require __DIR__ . '/../views/layouts/mostrar.php';
    }

    public function delete() {
        $productId = $_POST['id'] ?? null;
        if ($productId === null) {
            die('ID del producto es requerido.');
        }

        $productId = filter_var($productId, FILTER_VALIDATE_INT);
        if (false === $productId) {
            die('ID inválido.');
        }

        if ($this->productModel->delete($productId)) {
            header("Location: /miapp/mostrarProduct");
            exit;
        } else {
            die("No se pudo eliminar el producto.");
        }
    }



    public function editView($productId) {
        $product = $this->productModel->getProductById($productId);
        require __DIR__ . '/../views/layouts/editProduct.php';
    }

    public function editProduct() {
        $productId = $_POST['id'];
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
    
        if ($this->productModel->update($productId, $name, $amount, $price)) {
            header("Location: /miapp/mostrarProduct");
            exit;
        } else {
            echo "<div class='alert alert-danger'>No se pudo actualizar el producto.</div>";
        }
    }
    
    public function search() {
        if (!empty($_GET['search'])) {
            $search_term = $_GET['search'];
            $products = $this->productModel->searchProductsByName($search_term);
            require __DIR__ . '/../views/layouts/mostrar.php'; // Asegúrate de tener una vista para mostrar los resultados
        } else {
            // Llamar a una vista diferente o manejar la ausencia de término de búsqueda
            $products = [];
            require __DIR__ . '/../views/layouts/buscar.php';
        }
    }
    
    
}