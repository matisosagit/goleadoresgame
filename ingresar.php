<?php
include("conexion.php");
$conexion = conectar();
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;

$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE nombre = ? AND contraseña = ?");
if ($stmt) {
    $stmt->bind_param("ss", $nombre, $contraseña);
    $stmt->execute();
    $stmt->store_result();
    if( $stmt->num_rows > 0) {
        session_start();
        $_SESSION['nombre'] = $nombre;
        header("location: index.php");
    } else {
        echo"nombre o contraseña incorrectos";
    }
    $stmt->close();
}
$conexion->close();
?>