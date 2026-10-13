<?php
require_once __DIR__ . '/../models/Sesion.php';
require_once __DIR__ . '/../models/Autenticacion.php';

/**
 * Clase AuthController
 * Gestiona el acceso a la aplicación: muestra el formulario de login,
 * valida las credenciales y cierra la sesión.
 * (Sustituye a los antiguos sesiones/validarlogin.php y sesiones/logout.php)
 */
class AuthController
{
  /**
   * Muestra el formulario de acceso.
   */
  public function mostrarLogin(): void
  {
    require __DIR__ . '/../views/login.php';
  }

  /**
   * Procesa el formulario de login.
   * Si las credenciales son correctas guarda usuario y rol en la sesión;
   * en cualquier caso vuelve a index.php, que decidirá qué vista mostrar.
   */
  public function login(): void
  {
    // Protección: si se entra sin enviar el formulario, volvemos al inicio
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      $this->redirigir('index.php');
    }

    // Recogemos los datos de forma segura (si no vienen, texto vacío)
    $usuario  = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    // El modelo nos devuelve el rol ('admin' / 'user') o null si son incorrectas
    $rol = Autenticacion::validarCredenciales($usuario, $password);

    if ($rol !== null) {
      Sesion::login($usuario, $rol);
    }

    $this->redirigir('index.php');
  }

  /**
   * Cierra la sesión del usuario y vuelve al login.
   */
  public function logout(): void
  {
    Sesion::cerrar();
    $this->redirigir('index.php');
  }

  /**
   * Redirige a otra página y detiene la ejecución.
   */
  private function redirigir(string $url): void
  {
    header("Location: $url");
    exit();
  }
}
