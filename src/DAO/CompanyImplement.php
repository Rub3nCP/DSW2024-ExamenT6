<?php

namespace  Ruben\Examen6\Dao;

use  Ruben\Examen6\Database\Database;
use  Ruben\Examen6\Models\Companies;

use PDO;

class CompanyImplement
{
  private Database $db;

  public function __construct()
  {
    $this->db = new Database();
  }

  public function findAll(): array
  {
    $query = 'SELECT * FROM `companies`';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->execute();
    $companies = [];
    while ($companyRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $company = new Companies(
        $companyRecord['id'],
        $companyRecord['name'],
        $companyRecord['contact_info'],
      );
      $companies[] = $company;
    }
    return $companies;
  }
  public function findById($id)
  {
    $query = 'SELECT * FROM `companies` WHERE id LIKE :id';
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    while ($companyRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $company = new Companies(
        $companyRecord['id'],
        $companyRecord['name'],
        $companyRecord['contact_info'],
      );
      $companies[] = $company;
    }
    return $companies[0];
  }

  public function create(string $name, string $contactInfo)
  {
    $query = "INSERT INTO `companies` (name, contact_info) VALUES (:name, :contact_info)";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contact_info', $contactInfo);
    $stmt->execute();
  }

  public function delete($id)
  {
    $query = "DELETE FROM companies WHERE id LIKE :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
  public function update($id, string $name, string $contactInfo)
  {
    $query = "UPDATE companies SET name = :name, contact_info = :contact_info WHERE id LIKE :id";
    $stmt = $this->db->getConnection()->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contact_info', $contactInfo);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }

  // public function findGroupsByUserId(int $id)
  // {
  //   $query = "SELECT id, name FROM `groups` INNER JOIN group_user ON `groups`.id = group_user.id_group WHERE group_user.id_user = :id_user";
  //   $stmt = $this->db->getConnection()->prepare($query);
  //   $stmt->bindParam(':id_user', $id);
  //   $stmt->execute();
  //   $groups = [];
  //   while ($groupRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
  //     $group = new Group(
  //       $groupRecord['id'],
  //       $groupRecord['name'],
  //     );
  //     $groups[] = $group;
  //   }
  //   return $groups;
  // }
  // public function deleteUsers(array $id_users, $id_group)
  // {
  //   $id_user = null;
  //   $query = "DELETE FROM group_user WHERE id_user = :id_user AND id_group = :id_group";
  //   $stmt = $this->db->getConnection()->prepare($query);
  //   $stmt->bindParam(':id_user',  $id_user);
  //   $stmt->bindParam(':id_group', $id_group);
  //   foreach ($id_users as $id_user) {
  //     $stmt->execute();
  //   }
  // }

  // public function insertUsers(array $id_users, $id_group)
  // {
  //   $id_user = null;
  //   $query = "INSERT INTO group_user (id_user, id_group) VALUES (:id_user, :id_group)";
  //   $stmt = $this->db->getConnection()->prepare($query);
  //   $stmt->bindParam(':id_user',  $id_user);
  //   $stmt->bindParam(':id_group', $id_group);
  //   foreach ($id_users as $id_user) {
  //     printf("<p>Añadiendo usuario: %d, grupo; %d</p>", $id_user, $id_group);
  //     $stmt->execute();
  //   }
  // }
}