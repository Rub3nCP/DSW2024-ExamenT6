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
  public function getInfoById($id)  //No es eficiente pero solo tengo que copiar pegar y añadir un 0 :)
  {
    //$query = 'SELECT * FROM products INNER JOIN companies ON products.company_id = group_user.id_user WHERE group_user.id_group = :id_group';

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
  // public function findProductsByCompanyId(int $id)
  // {
  //   $query = 'SELECT id, name, price FROM products INNER JOIN companies ON products.id = companies.id WHERE companies.company_id = :company_id';
  //   $stmt = $this->db->getConnection()->prepare($query);
  //   $stmt->bindParam(':id_group', $id);
  //   $stmt->execute();
  //   $products = [];
  //   while ($productRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //     $product = new Products(
  //       $productRecord['id'],
  //       $productRecord['name'],
  //       "",
  //       $productRecord['price'],
  //       "",
  //     );
  //     $products[] = $product;
  //   }
  //   return $products;
  // }
}