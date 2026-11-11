<?php
session_start();
require_once __DIR__ . '/../../controlador/usuarioControlador.php';

$controlador = new usuarioControlador();
$controlador->login();

header("Location: ../../index.php");
exit();
