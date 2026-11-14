<?php
require_once __DIR__ . "/bdmodel.php";

//Modelo con todas las consultas SQL de la tabla pedidos
//Campos: id, titulo, isbn, fecha, usuario
class pedidoModel
{
  //Devuelve todos los pedidos
  public function obtenerTodos()
  {
    return BaseDatos::consultaLectura("SELECT id, titulo, isbn, fecha, usuario FROM pedidos");
  }

  //Devuelve un pedido por su id o null si no existe
  public function buscarPorId($id)
  {
    $filas = BaseDatos::consultaLectura("SELECT id, titulo, isbn, fecha, usuario FROM pedidos WHERE id = ?", (int) $id);
    return $filas ? $filas[0] : null;
  }

  //Inserta un pedido nuevo
  //Si no se indica la fecha, se guarda la de hoy
  public function insertar($titulo, $isbn, $usuario, $fecha = null)
  {
    return BaseDatos::consultaInsercion(
      "INSERT INTO pedidos (titulo, isbn, fecha, usuario) VALUES (?, ?, ?, ?)",
      (string) $titulo,
      (string) $isbn,
      $fecha ?? date('Y-m-d'),
      (string) $usuario
    );
  }

  //Actualiza todos los datos de un pedido
  public function actualizar($id, $titulo, $isbn, $fecha, $usuario)
  {
    return BaseDatos::consultaInsercion(
      "UPDATE pedidos SET titulo = ?, isbn = ?, fecha = ?, usuario = ? WHERE id = ?",
      (string) $titulo,
      (string) $isbn,
      (string) $fecha,
      (string) $usuario,
      (int) $id
    );
  }

  //Elimina un pedido por su id
  public function eliminar($id)
  {
    return BaseDatos::consultaInsercion("DELETE FROM pedidos WHERE id = ?", (int) $id);
  }
}
