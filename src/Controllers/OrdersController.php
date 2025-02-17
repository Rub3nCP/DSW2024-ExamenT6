<?php

namespace Ruben\Examen6\Controllers;

use Ruben\Examen6\Dao\OrdersImplement;
use Ruben\Examen6\Dao\OrdersDetailedImplement;
use Ruben\Examen6\Dao\ProductsImplement;

class OrdersController extends Controller
{

  //Solicitudes e instancias de la base de datos.
  public function index()
  {
    $orderDAO = new OrdersImplement();
    $orders = $orderDAO->findAll();
    echo $this->blade->view()->make('orders.index', compact('orders'))->render();
  }
  public function showDetails($param)
  {
    $id = $param['id'];
    $orderDAO = new OrdersImplement();
    $orderInfo = $orderDAO->getInfoById($id);

    $orderDetailsDAO = new OrdersDetailedImplement();
    $ordersDetailInfo = $orderDetailsDAO->findById($id);

     // Calculamos el total del pedido sumando los subtotales de cada detalle.
    $total = 0;
    foreach ($ordersDetailInfo as $detailedOrder) {
      $total += $detailedOrder->getSub();
    }
    echo $this->blade->view()->make('orders.detail', compact('orderInfo', 'ordersDetailInfo', 'total'))->render();
  }
  public function showNewOrder($param)
  {
    $companyId = $param['id'];
    $productDao = new ProductsImplement();
    $products = $productDao->findByCompanyId($companyId);

    echo $this->blade->view()->make('orders.create', compact('products', 'companyId'))->render();
  }

  public function saveOrder($params)
{
    $companyId = $_POST['company_id']; 
    $orderDAO = new OrdersImplement();
    
    $orderId = $orderDAO->createOrder($companyId);

    // Añadimos los productos seleccionados al pedido
    foreach ($_POST['products'] as $productId => $cantidad) {
        if ($cantidad > 0) {
            $orderDAO->addProductToOrder($orderId, $productId, $cantidad);
        }
    }

    header("Location: /orders/details/$orderId");
    exit();
}



}
