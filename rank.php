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