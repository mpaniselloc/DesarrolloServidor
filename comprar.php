<?php
session_start();
//Solo pueden comprar los usuarios que han iniciado sesión
if (!isset($_SESSION['usuario'])) {
  header("Location: index.php");
  exit();
}

require_once "controlador/pedidoControlador.php";
$controlador = new pedidoControlador();

$error = null;
$realizado = false;

//La compra llega por POST y se procesa antes de montar la página
if ($_SERVER['REQUEST_METHOD'] == "POST" && ($_POST['accion'] ?? "") == "comprar") {
  $error = $controlador->realizarCompra();
  //Si no hay error, el pedido se ha guardado
  $realizado = ($error === null);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="includes/styles.css">
  <title>Comprar libro</title>
</head>

<body>
  <?php include "includes/cabecera.html"; ?>
  <section class="completo">
    <?php
    if ($realizado) {
      $controlador->pedidoRealizado();
    } else {
      //Viene del botón Comprar del catálogo o de un intento con error
      $controlador->formularioCompra($error);
    }
    ?>
  </section>
  <?php include "includes/pie.html"; ?>
</body>

</html>
