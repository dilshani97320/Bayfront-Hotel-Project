<?php

class Product extends DB{
    private $table = "product";
    Private $conn;

    public function __construct()
    {
        // var_dump($this->connect());
        $this->conn = $this->connect();
    }
    public function getAllProduct()
    {
        return $this->conn->get($this->table);
    }
}



?>