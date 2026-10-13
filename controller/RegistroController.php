<?php
require_once __DIR__ . '/../models/Usuario.php';

/**
 * Clase RegistroController
 * Gestiona el alta de un nuevo usuario en tres pasos:
 * formulario -> confirmación -> registro completado.
 * (Sustituye a NuevoRegistro.php, components/forms/nuevoUsuario.php,
 *  sesiones/confirmarRegistro.php y sesiones/crearRegistro.php)
 */
class RegistroController
{
  /**
   * Paso 1: muestra el formulario de alta.
   * Si llegan datos por POST (botón "Cancelar" de la confirmación),
   * se rellenan los campos con ellos; si no, el formulario sale vacío.
   */
  public function formulario(): void
  {
    $usuario = $this->datosRecibidos()
      ? $this->crearUsuarioDesdePost()
      : new Usuario("", 0, "", "");

    require __DIR__ . '/../views/registro_formulario.php';
  }

  /**
   * Paso 2: muestra los datos introducidos para que el usuario los confirme.
   */
  public function confirmar(): void
  {
    if (!$this->datosRecibidos()) {
      $this->error("No se han recibido los datos correctamente");
      return;
    }

    $usuario = $this->crearUsuarioDesdePost();
    require __DIR__ . '/../views/registro_confirmar.php';
  }

  /* Paso 3: crea el usuario y muestra el mensaje de registro completado.*/
  public function crear(): void
  {
    if (!$this->datosRecibidos()) {
      $this->error("Los datos no se han registrado");
      return;
    }

    $usuario = $this->crearUsuarioDesdePost();
    require __DIR__ . '/../views/registro_completado.php';
  }


  /* Comprueba que llegan todos los campos del formulario por POST.*/
  private function datosRecibidos(): bool
  {
    return isset($_POST['nombre'], $_POST['edad'], $_POST['nick'], $_POST['password']);
  }

  /**
   * Crea un objeto Usuario con los datos recibidos por POST.
   */
  private function crearUsuarioDesdePost(): Usuario
  {
    return new Usuario(
      $_POST['nombre'],
      (int)$_POST['edad'],
      $_POST['nick'],
      $_POST['password']
    );
  }

  /**
   * Muestra un mensaje de error sencillo.
   */
  private function error(string $mensaje): void
  {
    echo '<h1>' . htmlspecialchars($mensaje) . '</h1>';
  }
}
