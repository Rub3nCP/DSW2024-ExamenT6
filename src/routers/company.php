<?php
$router->map('GET', '/companies', 'CompanyController#index', 'company-index');
$router->map('POST', '/companies', 'CompanyController#post');
$router->map('DELETE', '/companies/[i:id]', 'CompanyController#deleteCompany');
$router->map('GET', '/companies/[i:id]/edit', 'CompanyController#editCompany');
$router->map('PUT', '/companies/[i:id]', 'CompanyController#updateCompany');


$router->map('GET', '/products', 'ProductsController#index');
$router->map('GET', '/products/[i:id]', 'ProductsController#showByCompanyId');
$router->map('GET', '/products/details/[i:id]', 'ProductsController#showDetails');
$router->map('GET', '/products/add', 'ProductsController#showNewProduct');
$router->map('POST', '/products', 'ProductsController#createNewProduct');


$router->map('GET', '/orders', 'OrdersController#index');
$router->map('GET', '/orders/details/[i:id]', 'OrdersController#showDetails');
$router->map('GET', '/orders/add/[i:id]', 'OrdersController#showNewOrder');
$router->map('POST', '/orders/save', 'OrdersController#saveOrder', 'orders.save');
