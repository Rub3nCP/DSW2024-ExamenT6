<?php

namespace  Ruben\Examen6\Dao;

use  Ruben\Examen6\Database\Database;
use  Ruben\Examen6\Models\Orders;
use Ruben\Examen6\Models\Products;
use PDO;

class OrdersImplement
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function findAll(): array
  {
    $query = 'SELECT * FROM `orders`';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();

    $orders = [];
    while ($orderRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $order = new Orders(
        $orderRecord['id'],
        $orderRecord['order_date'],
        $orderRecord['company_id'],
      );
      $orders[] = $order;
    }
    return $orders;
  }
  public function getInfoById($id) // No es eficiente pero solo tengo que copiar pegar y añadir un 0 :)
  {
    $query = 'SELECT * FROM products INNER JOIN companies ON products.company_id = group_user.id_user WHERE group_user.id_group = :id_group';

    $query = 'SELECT * FROM `orders` WHERE id LIKE :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $orders = [];
    while ($orderRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $order = new Orders(
        $orderRecord['id'],
        $orderRecord['order_date'],
        $orderRecord['company_id'],
      );
      $orders[] = $order;
    }
    return $orders[0];
  }
}
