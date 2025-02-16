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
    $this->db = new Database(); // Aquí inicializas la instancia de Database.
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
    return $orders[0]; // Retornamos el primer pedido.
  }

  public function createOrder($companyId)
{
    // Asegúrate de que el nombre de la columna es 'order_date'
    $stmt = $this->db->getConnection()->prepare("INSERT INTO orders (company_id, order_date) VALUES (?, NOW())");
    $stmt->execute([$companyId]); // Inserta el ID de la empresa y la fecha actual (NOW())
    return $this->db->getConnection()->lastInsertId(); // Retorna el último ID insertado
}

  public function addProductToOrder($orderId, $productId, $cantidad)
  {
    // Usamos la instancia de Database para obtener la conexión
    $stmt = $this->db->getConnection()->prepare("INSERT INTO order_products (order_id, product_id, quantity, price)
                          SELECT ?, ?, ?, price FROM products WHERE id = ?");
    $stmt->execute([$orderId, $productId, $cantidad, $productId]);
  }
}
