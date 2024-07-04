<?php
namespace App\Models;

class Database {
    private $pdo;

    public function __construct($config) {
        $connection = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';charset=' . $config['charset'];
        $this->pdo = new \PDO($connection, $config['user'], $config['password']);
        // Configura el modo de error de PDO
        $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    
    public function getPdo() {
        return $this->pdo;
    }
}
