<?php

/**
 * index.php - Punto de entrada único de la aplicación (Front Controller).
 * Todas las peticiones pasan por aquí. Según el parámetro ?accion=...
 * se llama al método del controlador correspondiente.
 */
require_once __DIR__ . '/models/Sesion.php';
require_once __DIR__ . '/controller/AuthController.php';
require_once __DIR__ . '/controller/PanelController.php';
require_once __DIR__ . '/controller/RegistroController.php';

$accion = $_GET['accion'] ?? '';

switch ($accion) {
  // --- Acceso ---
  case 'login':
    (new AuthController())->login();
    break;

  case 'logout':
    (new AuthController())->logout();
    break;

  // --- Registro de nuevo usuario ---
  case 'registro':
    (new RegistroController())->formulario();
    break;

  case 'confirmar':
    (new RegistroController())->confirmar();
    break;

  case 'crear':
    (new RegistroController())->crear();
    break;

  // --- Página por defecto: panel si hay sesión, login si no ---
  default:
    if (Sesion::estaActiva()) {
      (new PanelController())->mostrar();
    } else {
      (new AuthController())->mostrarLogin();
    }
    break;
}
