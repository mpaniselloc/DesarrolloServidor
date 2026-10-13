<?php
/**
 * Clase Autenticacion
 * Contiene la regla de negocio que decide qué usuarios pueden entrar
 * en la aplicación y con qué rol (admin o user).
 */
class Autenticacion
{
  // Usuarios permitidos con su contraseña y su rol
  private const USUARIOS = [
    'admin' => ['password' => 'abcdef', 'rol' => 'admin'],
    'user'  => ['password' => '123456', 'rol' => 'user'],
  ];

  /**
   * Comprueba si el usuario y la contraseña son correctos.
   * Devuelve el rol del usuario ('admin' o 'user') o null si las credenciales no son válidas.
   */
  public static function validarCredenciales(string $usuario, string $password): ?string
  {
    if (isset(self::USUARIOS[$usuario]) && self::USUARIOS[$usuario]['password'] === $password) {
      return self::USUARIOS[$usuario]['rol'];
    }
    return null;
  }
}
