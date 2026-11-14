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
  //Devuelve null si todo va bien o el mensaje de error si algo falla
  public function actualizarPedido()
  {
    $id = $_POST['id'] ?? 0;
    $titulo = trim($_POST['titulo'] ?? "");
    $isbn = trim($_POST['isbn'] ?? "");
    $fecha = trim($_POST['fecha'] ?? "");
    $usuario = trim($_POST['usuario'] ?? "");

    //Si el pedido no existe, no hay nada que modificar
    if (!$this->pedidos->buscarPorId($id)) {
      return null;
    }

    if ($titulo == "" || $isbn == "" || $fecha == "" || $usuario == "") {
      return "Rellena todos los campos.";
    }

    $this->pedidos->actualizar($id, $titulo, $isbn, $fecha, $usuario);
    return null;
  }

  //Elimina el pedido que llega por POST
  public function eliminarPedido()
  {
    if (isset($_POST['id'])) {
      $this->pedidos->eliminar($_POST['id']);
    }
  }

  //Muestra el formulario de compra con los datos del libro elegido en el catálogo
  //Si viene de un intento fallido, muestra el error y lo que se había escrito
  public function formularioCompra($error = null)
  {
    $titulo = $_POST['titulo'] ?? "";
    $isbn = $_POST['isbn'] ?? "";
    $fecha = $_POST['fecha'] ?? date('Y-m-d');
    //El usuario siempre es el de la sesión
    $usuario = $_SESSION['usuario'];

    //Si no llega ningún libro, no hay nada que comprar
    if ($titulo == "" || $isbn == "") {
      echo '<article class="centrado"><h2>No has elegido ningún libro</h2><a href="index.php">Volver al listado de libros</a></article>';
      return;
    }

    include __DIR__ . '/../vista/comprarVista.php';
  }

  //Guarda el pedido nuevo
  //Devuelve null si todo va bien o el mensaje de error si algo falla
  public function realizarCompra()
  {
    $titulo = trim($_POST['titulo'] ?? "");
    $isbn = trim($_POST['isbn'] ?? "");
    $fecha = trim($_POST['fecha'] ?? "");
    //No se usa el usuario del formulario: así nadie puede comprar a nombre de otro
    $usuario = $_SESSION['usuario'];

    if ($titulo == "" || $isbn == "" || $fecha == "") {
      return "Rellena todos los campos.";
    }

    if (!$this->pedidos->insertar($titulo, $isbn, $usuario, $fecha)) {
      return "No se ha podido guardar el pedido. Inténtalo de nuevo.";
    }

    return null;
  }

  //Muestra el mensaje de pedido realizado
  public function pedidoRealizado()
  {
    include __DIR__ . '/../vista/pedidoRealizadoVista.php';
  }
}
