<?php
require_once __DIR__ . '/../models/Sesion.php';

/**
 * Clase PanelController
 * Muestra la página principal del usuario que ha iniciado sesión.
 * (Sustituye a la parte PHP del antiguo sesiones/index.php)
 */
class PanelController
{
  /**
   * Muestra el panel. Se asume que index.php ya ha comprobado
   * que la sesión está activa antes de llamar a este método.
   */
  public function mostrar(): void
  {
    // Datos que necesita la vista
    $usuario    = Sesion::getUsuario();
    $rol        = Sesion::getRol();
    $horaInicio = Sesion::getHoraInicio();

    require __DIR__ . '/../views/panel.php';
  }
}
