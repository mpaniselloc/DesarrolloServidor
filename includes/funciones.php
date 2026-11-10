<?php
function comprobarVariables(){
    if (isset($_POST['nombre']) && isset($_POST['edad']) && isset($_POST['nick']) && isset($_POST['contrasena'])){
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $nick = $_POST['nick'];
        $contrasena = $_POST['contrasena'];
    $contenido = true;
 return [$nombre,$edad,$nick,$contrasena,$contenido];
} else {
    $contenido = false;
    return $contenido;
}

}
function categoriaEdad($a){
    $b="";
    if ($a >= 15 && $a <= 20){
        $b = "Joven";
    } elseif ($a > 60) {
        $b = "Senior";
    } else {
        $b ="";
    }
return $b;

    }

function imagenEdad($a){
$b="";
if ($a >= 15 && $a <= 20){
    $b = "&#128512;";
}
return $b;
}
function oferta($a){
    if ($a=="si"){
     $b= "Promocion del 30%";
     return $b;
    }
}
?>