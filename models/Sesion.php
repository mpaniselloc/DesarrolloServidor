<?php
/*
 Clase Sesion
 Centraliza el manejo de $_SESSION para cualquier tipo de usuario (admin o user).
 Guarda el usuario, su rol y la hora de inicio, y controla la caducidad de 30 minutos.
 */
class Sesion
{
  // Tiempo máximo de inactividad: 30 minutos (en segundos)
  private const TIEMPO_MAXIMO = 30 * 60;

  // Arranca la sesión de PHP solo si no estaba ya iniciada
  public static function iniciar(): void
  {
    if (session_status() === PHP_SESSION_NONE) {
      session_start();
    }
  }

  // Guarda los datos del usuario tras un login correcto
  public static function login(string $usuario, string $rol): void
  {
    self::iniciar();
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol']     = $rol;
    $_SESSION['inicio']  = time(); // Hora de inicio (no cambia)
    $_SESSION['tiempo']  = time(); // Última actividad (se actualiza)
  }

  // Comprueba que hay sesión y que no han pasado 30 min de inactividad
  public static function estaActiva(): bool
  {
    self::iniciar();
    if (!isset($_SESSION['usuario'])) {
      return false;
    }
    if (time() - $_SESSION['tiempo'] > self::TIEMPO_MAXIMO) {
      self::cerrar();
      return false;
    }
    $_SESSION['tiempo'] = time(); // Renovamos la actividad
    return true;
  }

  // Devuelve true si el usuario conectado es administrador
  public static function esAdmin(): bool
  {
    return ($_SESSION['rol'] ?? '') === 'admin';
  }

  public static function getUsuario(): string
  {
    return $_SESSION['usuario'] ?? '';
  }

  public static function getRol(): string
  {
    return $_SESSION['rol'] ?? '';
  }

  // Hora de inicio formateada, p. ej. "13:36"
  public static function getHoraInicio(): string
  {
    return isset($_SESSION['inicio']) ? date('H:i', $_SESSION['inicio']) : '';
  }

  // Cierra la sesión por completo
  public static function cerrar(): void
  {
    self::iniciar();
    session_unset();
    session_destroy();
  }
}
