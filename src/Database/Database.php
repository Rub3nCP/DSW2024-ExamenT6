<?php

namespace  Ruben\Examen6\Database;

use PDO;
use PDOException;

class Database
{
  private $host = 'localhost';
  private $db_name = 'examen6db';
  private $user = 'root';
  private $password = '';
  private $conn;

  public function __construct()
  {
    $this->connect();
  }

  private function connect()
  {
    $this->conn = null;

    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error de conexión: " . $e->getMessage();
    }
  }

  public function __destruct()
  {
    $this->disconnect();
  }

  private function disconnect()
  {
    $this->conn = null;
  }

  public function getConnection()
  {
    return $this->conn;
  }
}