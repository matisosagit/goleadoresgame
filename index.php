<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Goleadores Uy</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <header>
        <ul class="menu">
            <li>
                <a href="sesion.php">
                    <input type="button" class="btn10" value="<?php echo  isset($_SESSION['nombre']) ? htmlspecialchars($_SESSION['nombre']) : 'Ingresar';?>">
                </a>
            </li>
            <li>
                <a href="rank.php">
                    <input type="button" class="btn10" value="Ver Ranking">
                </a>
            </li>
        </ul>
    </header>
    <div class="inicio" id="inicio">
        <h1>Higher or Lower</h1>
        <h2>Fútbol uruguayo</h2>
        <input type="button" class="btn10" id="jugar" value="Jugar">
    </div>
    
    <div class="maain" id="maain">
        <div class="abc" id="abc">
            <div class="player1" id="player1">
                <img id="img1" src="misterio.jpg">
                <p id="txt1">Jugador 1</p>
            </div>
            <div class="player2" id="player2">
                <img id="img2" src="misterio.jpg" alt="">
                <p id="txt2">Jugador 2</p>
                <div class="buttons">
                    <input type="button" class="btn10" id="mayor" value="Más goles">
                    <input type="button" class="btn10" id="menor" value="Menos goles">
                </div>
            </div>
        </div>
    </div>

    <div class="fin" id="fin">
        <p>Fin del juego</p>
        <p id="puntuacion"></p>
        <form action="guardar.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="numero" name="numero" value="0">
            <input type="submit" value="Guardar puntaje.">
        </form>
        <input type="button" class="btn10" id="volver" value="Volver al inicio">
    </div>

    <script src="main.js"></script>
</body>
</html>