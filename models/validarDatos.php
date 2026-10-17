<?php

// Archivo de funciones reutilizables
function comprobarDatosRegistro()
{
  return isset($_POST['nombre'])
    && isset($_POST['edad'])
    && isset($_POST['nick'])
    && isset($_POST['password']);
}


// Comprueba si el usuario y contraseña coinciden con las credenciales válidas, creamos un array asociativo con los 2 usuarios que tenemos
function validarCredenciales($usuario, $password)
{
  $usuariosValidos = [
    'admin' => 'abcdef',
    'user'  => '123456'
  ];

  return isset($usuariosValidos[$usuario]) && $usuariosValidos[$usuario] === $password;
}
