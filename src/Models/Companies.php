<?php

namespace  Ruben\Examen6\Models;

use  Ruben\Examen6\CompanyImplement;

class Companies
{

  private int $id;
  private string $name;
  private string $contact_info;

  public function __construct(int $id, string $name, string $contact_info)
  {
    $this->id = $id;
    $this->name = $name;
    $this->contact_info = $contact_info;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getContactInfo()
  {
    return $this->contact_info;
  }

  // public function users() {
  //   $userDAO = new UserImplement();
  //   return $userDAO->findUsersByGroupId($this->id);
  // }
}