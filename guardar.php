<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ranking</title>
        <link rel="stylesheet" type="text/css" href="ranking.css">
    </head>
    <body id="rank">
        <h1>RANKING</h1>
        <ul id="lista">
                <?php
                include("conexion.php");
                $conexion = conectar();
                $num = isset($_POST['numero']) ? $_POST['numero'] : null;
                $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
                $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, puntaje) VALUES (?, ?)");
                if ($stmt) {
                    $stmt->bind_param("si", $nombre, $num); 
                    if ($stmt->execute()) {
                        echo "";
                    } else {
                        echo "Error al insertar el registro: " . $stmt->error;
                    }
                    $stmt->close();
                } else {
                    echo "Error al preparar la declaración: " . $conexion->error;
                }
                $resultado = mysqli_query($conexion, "SELECT * FROM `usuarios` ORDER BY `puntaje` DESC");
                if (mysqli_num_rows($resultado) > 0) {
                    echo"<table>";
                    echo"<br>";
                    echo'<a href="index.html"><input  type="button" class="btn10"  value="Volver al inicio"></a>';
                    echo"<tr><th>Nombre<th/><th>Puntaje<th/><tr>";
                    while ($fila = mysqli_fetch_assoc($resultado)) {
                        echo"<tr>";
                        echo"<td>" . $fila["nombre"] . "<td/>";
                        echo "<td>". $fila["puntaje"] ."<td/>";
                        echo"<tr/>";
                    }
                    echo "<table/>";
                    
                }
                $conexion->close();
                ?>
        </ul>
    </body>

</html>