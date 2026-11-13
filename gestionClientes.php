<?php
session_start();
//Solo puede entrar el admin
if (!isset($_SESSION['usuario']) || $_SESSION['usuario'] != "admin") {
  header("Location: index.php");
  exit();
}

require_once "controlador/usuarioControlador.php";
$controlador = new usuarioControlador();

//Las acciones que cambian datos llegan por POST y se procesan antes de enviar HTML,
//porque terminan con header("Location: ...") y eso solo funciona si aún no hay salida
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['accion'])) {
  if ($_POST['accion'] == "eliminar") {
    $controlador->eliminarUsuario();
  }
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="includes/styles.css">
  <title>Gestión de Clientes</title>
</head>

<body>
  <?php include "includes/cabecera.html"; ?>
  <section class="listado">
    <?php $controlador->listadoUsuarios(); ?>
  </section>
  <?php include "includes/pie.html"; ?>
</body>

</html>