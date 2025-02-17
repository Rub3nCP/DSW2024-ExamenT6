<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use Philo\Blade\Blade;

require '../vendor/autoload.php';
$pathController = "Ruben\\Examen6\\Controllers\\";

$router = new AltoRouter();

$views = '../src/views';
$cache = '../cache';
$blade = new Blade($views, $cache);

include('../src/routers/company.php');


if (isset($_POST['_method'])) {
  $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

$router->map('GET', '/', function () use ($blade) {
  echo $blade->view()->make('index')->render();
});


$match = $router->match();
if (is_array($match)) {
  if (is_callable($match['target'])) {
    call_user_func_array($match['target'], $match['params']);
  } else {
    $target = $match['target'];
    list($controllerName, $action) = explode("#", $target);
    $controller = new ($pathController . $controllerName)();
    $controller->$action($match['params']);
  }
} else {
  header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}