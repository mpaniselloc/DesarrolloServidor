<?php
//Clase base para conectar con la base de datos
class BaseDatos
{
  //Declaro la variable estática para almacenar la conexión
  private static $conexion = null;

  //Método para obtener la conexión a la base de datos
  private static function conexionBD()
  {
    $config = parse_ini_file(__DIR__ . "/../config.ini");

    if (self::$conexion === null) {
      self::$conexion = new mysqli($config['servidor'], $config['usuario'], $config['pasw'], $config['baseDatos']);
      if (self::$conexion->connect_error) {
        die("Error en la conexion " . self::$conexion->connect_error);
      }
      self::$conexion->set_charset("utf8");
    }
    return self::$conexion;
  }


  //Función auxiliar para preparar consultas
  private static function prepararConsulta($conexion, $consulta, ...$parametros)
  {
    $preparacion = $conexion->prepare($consulta);
    if ($parametros) {
      $tipos = "";
      foreach ($parametros as $parametro) {
        $tipos .= is_int($parametro) ? 'i' : 's';
      }
      $preparacion->bind_param($tipos, ...$parametros);
    }
    return $preparacion;
  }

  //Método para ejecutar consultas de inserción
  public static function consultaInsercion($consulta, ...$parametros)
  {
    $conexion = self::conexionBD();
    $preparacion = self::prepararConsulta($conexion, $consulta, ...$parametros);
    if ($preparacion->execute()) {
      return true;
    } else {
      return false;
    }
  }

  //Método para ejecutar consultas de lectura
  public static function consultaLectura($consulta, ...$parametros)
  {
    $conexion = self::conexionBD();
    $preparacion = self::prepararConsulta($conexion, $consulta, ...$parametros);
    $preparacion->execute();
    $resultado = $preparacion->get_result();
    //Comprueba si la consulta devuelve filas
    if ($resultado->num_rows > 0) {
      //Devuelve todas las filas como un array asociativo
      return $resultado->fetch_all(MYSQLI_ASSOC);
    } else {
      return null;
    }
  }

  //Método para cerrar la conexión
  public static function cerrarConexion()
  {
    if (self::$conexion !== null) {
      self::$conexion->close();
      self::$conexion = null;
    }
  }
}
