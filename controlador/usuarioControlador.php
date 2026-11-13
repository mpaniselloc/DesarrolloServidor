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

  //Obtiene los usuarios registrados y muestra la tabla de gestión de clientes
  public function listadoUsuarios()
  {
    $usuarios = $this->usuarios->obtenerTodos();
    include __DIR__ . '/../vista/GestionClientesVista.php';
  }

  //Muestra el formulario de modificar relleno con los datos del usuario
  //Si viene de un intento fallido, muestra el error y lo que se había escrito
  public function formularioEditar($error = null)
  {
    $id = $_POST['id'] ?? $_GET['id'] ?? 0;
    $usuario = $this->usuarios->buscarPorId($id);

    //Si el usuario no existe, se vuelve a mostrar la tabla
    if (!$usuario) {
      $this->listadoUsuarios();
      return;
    }

    //La primera vez se usan los datos de la base de datos; tras un error, lo que se escribió
    $nombre = $_POST['nombre'] ?? $usuario['nombre'];
    $edad = $_POST['edad'] ?? $usuario['edad'];
    include __DIR__ . '/../vista/editarUsuarioVista.php';
  }

  //Guarda los cambios de nombre y edad
  //Si todo va bien redirige a la tabla; si no, devuelve el mensaje de error
  public function actualizarUsuario()
  {
    $id = $_POST['id'] ?? 0;
    $nombre = trim($_POST['nombre'] ?? "");
    $edad = trim($_POST['edad'] ?? "");

    //Si el usuario no existe, no hay nada que modificar
    if (!$this->usuarios->buscarPorId($id)) {
      header("Location: gestionClientes.php");
      exit();
    }

    if ($nombre == "" || $edad == "") {
      return "Rellena todos los campos.";
    }
    if (!ctype_digit($edad)) {
      return "La edad tiene que ser un número.";
    }

    $this->usuarios->actualizar($id, $nombre, $edad);

    //Redirige para que al pulsar F5 no se vuelva a enviar el formulario
    header("Location: gestionClientes.php");
    exit();
  }

  //Elimina el usuario que llega por POST y vuelve a la tabla
  public function eliminarUsuario()
  {
    if (isset($_POST['id'])) {
      $usuario = $this->usuarios->buscarPorId($_POST['id']);

      //El admin no se puede borrar: si no, nadie podría volver a entrar al panel
      if ($usuario && $usuario['nick_usuario'] != "admin") {
        $this->usuarios->eliminar($usuario['id']);
      }
    }

    //Redirige para que al pulsar F5 no se repita el borrado
    header("Location: gestionClientes.php");
    exit();
  }

  //Comprueba el nick y la contraseña contra la base de datos e inicia la sesión
  public function login()
  {
    if (isset($_POST['usuario']) && isset($_POST['passw'])) {
      $usuario = $this->usuarios->validarLogin($_POST['usuario'], $_POST['passw']);

      if ($usuario) {
        //index.php usa este valor para elegir la vista de admin o la de user
        $_SESSION['usuario'] = $usuario['nick_usuario'];
        $_SESSION['tiempo'] = time();
      }
    }
  }
}
