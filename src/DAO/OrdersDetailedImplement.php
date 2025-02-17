<?php

namespace  Ruben\Examen6\Dao;

use  Ruben\Examen6\Database\Database;
use  Ruben\Examen6\Models\OrderDetails;

use PDO;

class OrdersDetailedImplement
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }
  public function findAll(): array
  {
    $query = 'SELECT * FROM `order_details`';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();

    $orders = [];
    // Recorre los resultados y crea objetos OrderDetails
    while ($orderRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $order = new OrderDetails(
        $orderRecord['id'],
        $orderRecord['order_id'],
        $orderRecord['product_id'],
        $orderRecord['current_price'],
        $orderRecord['quantity'],

      );
      $orders[] = $order;
    }
    return $orders;
  }
  public function findById($id): array
  {
    $query = 'SELECT * FROM `order_details` WHERE order_id LIKE :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $orders = [];
    while ($orderRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $order = new OrderDetails(
        $orderRecord['id'],
        $orderRecord['order_id'],
        $orderRecord['product_id'],
        $orderRecord['current_price'],
        $orderRecord['quantity'],

      );
      $orders[] = $order;
    }
    return $orders;
  }
}
