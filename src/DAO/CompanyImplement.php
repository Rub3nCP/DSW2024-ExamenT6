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
    $query = 'SELECT * FROM `companies`'; //Defino la consulta
    $stmt = $this->db->getConnection()->prepare($query); //Preparo la consulta
    $stmt->execute(); //Ejecuto la consulta
    $companies = []; //Creo un array vacío para almcenar los objetos de empresas
    
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
    $stmt->bindParam(':id', $id); //Buscar por ID
    $stmt->execute();
    
    while ($companyRecord = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $company = new Companies(
        $companyRecord['id'],
        $companyRecord['name'],
        $companyRecord['contact_info'],
      );
      $companies[] = $company; 
    }
    return $companies[0]; // Devuelve la primera empresa encontrada
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
    //Asignamos los valores a los parámetros
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':contact_info', $contactInfo);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
  }
}