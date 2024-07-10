<?php
session_start();
include("conexion.php");

// Validar y obtener el puntaje enviado desde JavaScript
$num = isset($_POST['numero']) ? $_POST['numero'] : null;

// Obtener el nombre de usuario de la sesión
$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : null;

// Validar que se recibieron todos los datos necesarios
if ($num !== null && $nombre !== null) {
    $conexion = conectar();
    $stmt = $conexion->prepare("UPDATE usuarios SET puntaje = ? WHERE nombre = ?");
    
    if ($stmt) {
        // Vincular parámetros y ejecutar la sentencia
        $stmt->bind_param("is", $num, $nombre);
        
        if ($stmt->execute()) {
            header("location:rank.php");
            exit();
        } else {
            echo "Error al actualizar el puntaje: " . $stmt->error;
        }

        // Cerrar la sentencia
        $stmt->close();
    } else {
        echo "Error en la preparación de la sentencia.";
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "Datos insuficientes para actualizar el puntaje.";
}
?>