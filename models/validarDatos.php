<?php

// Archivo de funciones reutilizables
function comprobarDatosRegistro()
{
  return isset($_POST['nombre'])
    && isset($_POST['edad'])
    && isset($_POST['nick'])
    && isset($_POST['password']);
}


// Comprueba si el usuario y contraseña coinciden con las credenciales válidas
function validarCredenciales($usuario, $password)
{
  // Por ahora comprobación fija 
  return ($usuario === 'admin' && $password === 'abcdef');
}
