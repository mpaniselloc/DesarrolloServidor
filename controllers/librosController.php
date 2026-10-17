<?php

require_once __DIR__ . "/../models/libros.php";

class librosController
{
  private $model;

  public function __construct()
  {
    $this->model = new Libros();
  }

  public function listaLibros()
  {
    return $this->model->getLibros();
  }
}
