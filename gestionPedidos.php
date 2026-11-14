<?php
session_start();
//Solo puede entrar el admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
  header("Location: index.php");
  exit();
}

require_once "controlador/pedidoControlador.php";
$controlador = new pedidoControlador();

//Qué pantalla se muestra: la tabla (por defecto) o el formulario de modificar
$accion = $_GET['accion'] ?? "";
$error = null;

//Las acciones que cambian datos llegan por POST y se procesan antes de enviar HTML,
//porque terminan con header("Location: ...") y eso solo funciona si aún no hay salida
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['accion'])) {
  if ($_POST['accion'] == "eliminar") {
    $controlador->eliminarPedido();
  } elseif ($_POST['accion'] == "actualizar") {
    //Si se guarda bien, redirige y no sigue; si llega aquí es que hay un error
    $error = $controlador->actualizarPedido();
    $accion = "editar";
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="includes/styles.css">
  <title>Gestión de Pedidos</title>
</head>

<body>
  <?php include "includes/cabecera.html"; ?>
  <section class="listado">
    <?php
    if ($accion == "editar") {
      $controlador->formularioEditar($error);
    } else {
      $controlador->listadoPedidos();
    }
    ?>
  </section>
  <?php include "includes/pie.html"; ?>
</body>

</html>