<?php

namespace Ruben\Examen6\Dao;

use Ruben\Examen6\Database\Database;
use Ruben\Examen6\Models\Orders;
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

     // Recorre los resultados y crea objetos Orders
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

  public function getInfoById($id)
  {
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

  public function createOrder($companyId)
{
    // Prepara la consulta SQL para insertar un nuevo pedido con la fecha actual
    $stmt = $this->db->getConnection()->prepare("INSERT INTO orders (company_id, order_date) VALUES (?, NOW())");
    $stmt->execute([$companyId]); 
    return $this->db->getConnection()->lastInsertId(); 
}

  public function addProductToOrder($orderId, $productId, $cantidad)
  {
    // Inserta un producto en la tabla `order_products` y obtiene su precio de la tabla `products`
    $stmt = $this->db->getConnection()->prepare("INSERT INTO order_products (order_id, product_id, quantity, price)
    SELECT ?, ?, ?, price FROM products WHERE id = ?");
    $stmt->execute([$orderId, $productId, $cantidad, $productId]);
  }
}
