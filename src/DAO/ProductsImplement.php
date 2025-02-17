<?php

namespace Ruben\Examen6\Dao;

use Ruben\Examen6\Database\Database;
use Ruben\Examen6\Models\Companies;
use Ruben\Examen6\Models\Products;

use PDO;

class ProductsImplement
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function findAll(): array
  {
    $query = 'SELECT * FROM `products`';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();

    $products = [];
    while ($productRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $product = new Products(
        $productRecord['id'],
        $productRecord['name'],
        $productRecord['description'],
        $productRecord['price'],
        $productRecord['company_id'],

      );
      $products[] = $product;
    }
    return $products;
  }
  public function findByCompanyId($id)
  {
    $query = 'SELECT * FROM `products` WHERE company_id LIKE :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $products = [];
    while ($productRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $product = new Products(
        $productRecord['id'],
        $productRecord['name'],
        $productRecord['description'],
        $productRecord['price'],
        $productRecord['company_id'],
      );
      $products[] = $product;
    }
    return $products;
  }
  public function getInfoById($id)  
  {
    $query = 'SELECT * FROM `products` WHERE id LIKE :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $products = [];
    while ($productRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $product = new Products(
        $productRecord['id'],
        $productRecord['name'],
        $productRecord['description'],
        $productRecord['price'],
        $productRecord['company_id'],

      );
      $products[] = $product;
    }
    return $products[0];
  }
  public function create(string $name, string $description, $price, $companyId)
  {
    $query = "INSERT INTO `products` (name, description, price, company_id) VALUES (:name, :description, :price, :company_id)";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':company_id', $companyId);

    $stmt->execute();
  }
}