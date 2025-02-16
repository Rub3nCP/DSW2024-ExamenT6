<?php

namespace  Ruben\Examen6\Models;


class OrderDetails
{
  private int $id;
  private int $orderId;
  private string $productName;
  private float $price;
  private float $quantity;



  public function __construct(int $id, $orderId, string $productName, float $price, int $quantity)
  {
    $this->id = $id;
    $this->orderId = $orderId;
    $this->productName = $productName;
    $this->price = $price;
    $this->quantity = $quantity;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of orderId
   */
  public function getOrderId()
  {
    return $this->orderId;
  }

  /**
   * Set the value of orderId
   *
   * @return  self
   */
  public function setOrderId($orderId)
  {
    $this->orderId = $orderId;

    return $this;
  }

  /**
   * Get the value of productName
   */
  public function getProductName()
  {
    return $this->productName;
  }

  /**
   * Set the value of productName
   *
   * @return  self
   */
  public function setProductName($productName)
  {
    $this->productName = $productName;

    return $this;
  }

  /**
   * Get the value of quantity
   */
  public function getQuantity()
  {
    return $this->quantity;
  }

  /**
   * Set the value of quantity
   *
   * @return  self
   */
  public function setQuantity($quantity)
  {
    $this->quantity = $quantity;

    return $this;
  }
  /**
   * Get the value of price
   */
  public function getPrice()
  {
    return $this->price;
  }

  /**
   * Set the value of price
   *
   * @return  self
   */
  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  /**
   * Get the value of quantity
   */
  public function getSub()
  {
    return $this->price * $this->quantity;
  }
}
