<?php
require_once __DIR__ . '/../model/usuarioModel.php';
include_once __DIR__ . '/../includes/funciones.php';

class usuarioControlador
{
  private $usuarios;

  public function __construct()
  {
    $this->usuarios = new usuarioModel();
  }

  //Recoge los datos del formulario, guarda el usuario y muestra el resultado
  public function alta()
  {
    $datos = comprobarVariables();

    //$estado le indica a la vista qué mensaje tiene que mostrar
    if (!$datos) {
      $estado = 'sin_datos';
    } else {
      list($nombre, $edad, $nick, $contrasena) = $datos;
      $categoriaEdad = categoriaEdad($edad);

      //insertar() devuelve false si el nick ya existe
      if ($this->usuarios->insertar($nombre, $edad, $nick, $contrasena)) {
        $estado = 'creado';
      } else {
        $estado = 'nick_repetido';
      }
    }

    include __DIR__ . '/../vista/altaVista.php';
  }

  //Comprueba el nick y la contraseña contra la base de datos e inicia la sesión
  public function login()
  {
    if (isset($_POST['usuario']) && isset($_POST['passw'])) {
      $usuario = $this->usuarios->validarLogin($_POST['usuario'], $_POST['passw']);

      if ($usuario) {
        //Cambia el id de sesión al iniciar sesión, por seguridad
        session_regenerate_id(true);
        //index.php usa este valor para elegir la vista de admin o la de user
        $_SESSION['usuario'] = $usuario['nick_usuario'];
        $_SESSION['tiempo'] = time();
      }
    }
  }
}
