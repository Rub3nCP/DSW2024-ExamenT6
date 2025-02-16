<?php

namespace  Ruben\Examen6\Models;

use  Ruben\Examen6\CompanyImplement;

class Products
{

  private int $id;
  private string $name;
  private string $description;
  private float $price;
  private int $companyId;

  public function __construct(int $id, string $name, string $description, float $price, int $companyId)
  {
    $this->id = $id;
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
    $this->companyId = $companyId;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getDescription()
  {
    return $this->description;
  }


  public function getPrice()
  {
    return $this->price;
  }


  public function setPrice($price)
  {
    $this->price = $price;

    return $this;
  }

  public function getCompanyId()
  {
    return $this->companyId;
  }

  public function setCompanyId($companyId)
  {
    $this->companyId = $companyId;

    return $this;
  }
}
