<?php

namespace  Ruben\Examen6\Models;


class Orders
{
  private int $id;
  private string $order_date;
  private int $companyId;

  public function __construct(int $id, $order_date, int $companyId)
  {
    $this->id = $id;
    $this->order_date = $order_date;
    $this->companyId = $companyId;
  }


  /**
   * Get the value of order_date
   */
  public function getOrder_date()
  {
    return $this->order_date;
  }

  /**
   * Set the value of order_date
   *
   * @return  self
   */
  public function setOrder_date($order_date)
  {
    $this->order_date = $order_date;

    return $this;
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
   * Get the value of companyId
   */
  public function getCompanyId()
  {
    return $this->companyId;
  }

  /**
   * Set the value of companyId
   *
   * @return  self
   */
  public function setCompanyId($companyId)
  {
    $this->companyId = $companyId;

    return $this;
  }
}