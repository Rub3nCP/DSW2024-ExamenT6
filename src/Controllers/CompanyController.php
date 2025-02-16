<?php

namespace Ruben\Examen6\Controllers;

use  Ruben\Examen6\Dao\CompanyImplement;

class CompanyController extends Controller
{

  public function index()
  {
    $companyDAO = new CompanyImplement();
    $companies = $companyDAO->findAll();
    echo $this->blade->view()->make('companies.index', compact('companies'))->render();
  }

  public function post()
  {
    $name = $_POST['name'];
    $contactInfo = $_POST['contact_info'];
    $companyDAO = new CompanyImplement();
    $companyDAO->create($name, $contactInfo);
    $this->index();
  }
  public function deleteCompany($param)
  {
    $id = $param['id'];
    $companyDAO = new CompanyImplement();
    $companyDAO->delete($id);
    $this->index();
  }
  public function editCompany($param)
  {
    $id = $param['id'];
    $companyDAO = new CompanyImplement();
    $companies = $companyDAO->findAll();
    $companyToEdit = $companyDAO->findById($id);

    echo $this->blade->view()->make('companies.edit', compact('companies', 'companyToEdit'))->render();
  }
  public function updateCompany($param)
  {
    $id = $param['id'];
    $companyDAO = new CompanyImplement();
    $companyDAO->update($id, $_POST['name'], $_POST['contact_info']);
    $this->index();
  }
}