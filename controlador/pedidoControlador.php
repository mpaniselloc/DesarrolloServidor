<?php
require_once __DIR__ . '/../model/pedidoModel.php';

class pedidoControlador
{
  private $pedidos;

  public function __construct()
  {
    $this->pedidos = new pedidoModel();
  }

  //Obtiene todos los pedidos y muestra la tabla de gestión de pedidos
  public function listadoPedidos()
  {
    $pedidos = $this->pedidos->obtenerTodos();
    include __DIR__ . '/../vista/GestionPedidosVista.php';
  }

  //Muestra el formulario de modificar relleno con los datos del pedido
  //Si viene de un intento fallido, muestra el error y lo que se había escrito
  public function formularioEditar($error = null)
  {
    $id = $_POST['id'] ?? $_GET['id'] ?? 0;
    $pedido = $this->pedidos->buscarPorId($id);

    //Si el pedido no existe, se vuelve a mostrar la tabla
    if (!$pedido) {
      $this->listadoPedidos();
      return;
    }

    //La primera vez se usan los datos de la base de datos; tras un error, lo que se escribió
    $titulo = $_POST['titulo'] ?? $pedido['titulo'];
    $isbn = $_POST['isbn'] ?? $pedido['isbn'];
    $fecha = $_POST['fecha'] ?? $pedido['fecha'];
    $usuario = $_POST['usuario'] ?? $pedido['usuario'];
    include __DIR__ . '/../vista/editarPedidoVista.php';
  }

  //Guarda los cambios del pedido
  //Si todo va bien redirige a la tabla; si no, devuelve el mensaje de error
  public function actualizarPedido()
  {
    $id = $_POST['id'] ?? 0;
    $titulo = trim($_POST['titulo'] ?? "");
    $isbn = trim($_POST['isbn'] ?? "");
    $fecha = trim($_POST['fecha'] ?? "");
    $usuario = trim($_POST['usuario'] ?? "");

    //Si el pedido no existe, no hay nada que modificar
    if (!$this->pedidos->buscarPorId($id)) {
      header("Location: gestionPedidos.php");
      exit();
    }

    if ($titulo == "" || $isbn == "" || $fecha == "" || $usuario == "") {
      return "Rellena todos los campos.";
    }

    //Comprueba que la fecha tenga el formato AAAA-MM-DD y que exista de verdad
    $partes = explode("-", $fecha);
    if (count($partes) != 3 || !ctype_digit(implode("", $partes)) || !checkdate((int) $partes[1], (int) $partes[2], (int) $partes[0])) {
      return "La fecha no es válida (formato AAAA-MM-DD).";
    }

    $this->pedidos->actualizar($id, $titulo, $isbn, $fecha, $usuario);

    //Redirige para que al pulsar F5 no se vuelva a enviar el formulario
    header("Location: gestionPedidos.php");
    exit();
  }

  //Elimina el pedido que llega por POST y vuelve a la tabla
  public function eliminarPedido()
  {
    if (isset($_POST['id'])) {
      $this->pedidos->eliminar($_POST['id']);
    }

    //Redirige para que al pulsar F5 no se repita el borrado
    header("Location: gestionPedidos.php");
    exit();
  }
}
