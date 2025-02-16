<?php

namespace Ruben\Examen6\Controllers;

use Ruben\Examen6\Dao\CompanyImplement;
use Ruben\Examen6\Dao\ProductsImplement;
use Ruben\Examen6\Models\Products;

class ProductsController extends Controller
{

  public function index()
  {
    $productDao = new ProductsImplement();
    $products = $productDao->findAll();
    echo $this->blade->view()->make('products.index', compact('products'))->render();
  }
  public function showByCompanyId($param)
  {

    $id = $param['id'];
    $productDao = new ProductsImplement();
    $products = $productDao->findByCompanyId($id);

    echo $this->blade->view()->make('products.index', compact('products'))->render();
  }
  public function showDetails($param)
  {
    $id = $param['id'];
    $productDao = new ProductsImplement();
    $productInfo = $productDao->getInfoById($id);
    echo $this->blade->view()->make('products.detail', compact('productInfo'))->render();
  }
  public function showNewProduct()
  {
    $companyDAO = new CompanyImplement();
    $companies = $companyDAO->findAll();
    echo $this->blade->view()->make('products.create', compact('companies'))->render();
  }
  public function createNewProduct()
  {
    $productDao = new ProductsImplement();
    $products = $productDao->create($_POST['name'], $_POST['product_description'], $_POST['product_price'], $_POST['company_selected']);
    $this->index();
  }
}
