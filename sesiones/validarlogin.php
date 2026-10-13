<?php
// Iniciamos sesion e incluimos el archivo que contiene la funcion validarCredenciales<
session_start();
include "../services/validarDatos.php";

// 1. Verificamos que la petición sea por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Recogemos datos de forma segura (si no vienen, asignamos un  texto vacío)
  $usuario  = $_POST['usuario'] ?? '';
  $password = $_POST['password'] ?? '';

  // 2. Evaluamos credenciales llamando a la función
  if (validarCredenciales($usuario, $password)) {
    // Credenciales CORRECTAS: guardamos la sesión y vamos al panel del usuario
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tiempo'] = time();

    header('Location: index.php');
    exit();
  } else {
    // Credenciales INCORRECTAS: volvemos al login principal
    header('Location: ../index.php');
    exit();
  }
} else {
  // Proteccion extra, si alguien intenta entrar a esta pagina sin enviar el formulario, directamente por la URL , le mandaremos al index
  header('Location: ../index.php');
  exit();
}
