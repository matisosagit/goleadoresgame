<?php
include("conexion.php");

$conexion = conectar();
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
$contraseña = isset($_POST['contraseña']) ? $_POST['contraseña'] : null;

$stmt = $conexion->prepare("SELECT id FROM usuarios WHERE nombre = ?");
if ($stmt) {
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $stmt->store_result();
    if( $stmt->num_rows > 0) {
        echo"este usuario ya existe";
    } else {
        $stmt->close();
        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, contraseña) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $nombre, $contraseña); 
        if ($stmt->execute()) {
            session_start();
            $_SESSION["nombre"] = $nombre;
            header("location: https://www.goleadoresuy.com");
        } else {
        echo "Error al insertar el registro: " . $stmt->error;
        }
        $stmt->close();
        } else {
        echo "Error al preparar la declaración: " . $conexion->error;
        }
        $conexion->close();
    }
}
?>