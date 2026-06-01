<?php

require_once __DIR__ . '/../../config/database.php';

class DB
{
    protected $conn;

    public function __construct()
    {
        $database = new Database();
        $this->conn = $database->connect();
    }
}