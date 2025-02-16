<?php

namespace  Ruben\Examen6\Controllers;

use Philo\Blade\Blade;

abstract class Controller
{

  protected $blade;

  public function __construct()
  {
    $views = '../src/views';
    $cache = '../cache';
    $this->blade = new Blade($views, $cache);
  }
}