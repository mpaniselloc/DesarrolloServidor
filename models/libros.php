<?php

class Libros
{
  private $xmlFile = __DIR__ . "/libreria.xml";

  public function getLibros()
  {
    if (file_exists($this->xmlFile)) {
      $libros = simplexml_load_file($this->xmlFile);
      return $libros;
    } else {
      exit('Error al abrir el archivo XML');
    }
  }
}
