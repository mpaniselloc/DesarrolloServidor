<?php
require_once __DIR__ . "/bdmodel.php";

//Modelo con todas las consultas SQL de la tabla usuarios
//Campos: id, nombre, edad, nick_usuario, contrasena
class usuarioModel
{
  //Devuelve todos los usuarios (sin la contraseña)
  public function obtenerTodos()
  {
    return BaseDatos::consultaLectura("SELECT id, nombre, edad, nick_usuario FROM usuarios");
  }

  //Devuelve un usuario por su id o null si no existe
  public function buscarPorId($id)
  {
    $filas = BaseDatos::consultaLectura("SELECT * FROM usuarios WHERE id = ?", (int) $id);
    return $filas ? $filas[0] : null;
  }

  //Devuelve un usuario por su nick o null si no existe
  public function buscarPorNick($nick)
  {
    $filas = BaseDatos::consultaLectura("SELECT * FROM usuarios WHERE nick_usuario = ?", $nick);
    return $filas ? $filas[0] : null;
  }

  //Inserta un usuario nuevo guardando la contraseña cifrada en SHA-256
  public function insertar($nombre, $edad, $nick, $contrasena)
  {
    //Verifica que el nick no exista
    if ($this->buscarPorNick($nick)) {
      return false;
    }

    return BaseDatos::consultaInsercion(
      "INSERT INTO usuarios (nombre, edad, nick_usuario, contrasena) VALUES (?, ?, ?, ?)",
      $nombre,
      (int) $edad,
      $nick,
      hash('sha256', $contrasena)
    );
  }

  //Actualiza el nombre y la edad de un usuario
  public function actualizar($id, $nombre, $edad)
  {
    return BaseDatos::consultaInsercion(
      "UPDATE usuarios SET nombre = ?, edad = ? WHERE id = ?",
      $nombre,
      (int) $edad,
      (int) $id
    );
  }

  //Elimina un usuario por su id
  public function eliminar($id)
  {
    return BaseDatos::consultaInsercion("DELETE FROM usuarios WHERE id = ?", (int) $id);
  }

  //Devuelve el usuario si el nick y la contraseña son correctos; si no, null
  public function validarLogin($nick, $contrasena)
  {
    $usuario = $this->buscarPorNick($nick);
    //Cifra la contraseña escrita con SHA-256 y la compara con la guardada
    if ($usuario && hash_equals($usuario['contrasena'], hash('sha256', $contrasena))) {
      return $usuario;
    }
    return null;
  }
}
