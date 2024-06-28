<?php
function conectar(){
$host = 'host_name'; 
$user = 'usuario'; 
$password = 'contraseña'; 
$database = 'nombre_db'; 

$conexion = new mysqli($host, $user, $password, $database);

if ($conexion->connect_error) {
    die('Error al conectar: ' . $conexion->connect_error);
}else{
return $conexion;
}
}
?>

