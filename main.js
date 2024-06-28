var arrayimagenes = [
    ["Aldo Diaz", 15, "img/aldo diaz15.jpg"],
    ["Antonio Pacheco", 23, "img/antonio pacheco23.jpg"],
    ["Gastón Rodríguez", 19, "img/gaston rodriguez 19.jpg"],
    ["Gonzalo Bergessio", 25, "img/gonzalo bergessio25.jpg"],
    ["Héctor Acuña", 20, "img/hector acuña 20.jpg"],
    ["Ignacio Ramírez", 24, "img/ignacio ramirez24.jpg"],
    ["Iván Alonso", 23, "img/ivan alonso 23.jpg"],
    ["Juan Manuel Olivera", 18, "img/juan manuel olivera 18.jpeg"],
    ["Liber Quiñones", 12, "img/liber quiñones 12.jpeg"],
    ["Maureen Franco", 25, "img/maureen franco 25.jpg"],
    ["Maximiliano Silvera",21 , "img/maximiliano silvera21.jpg"],
    ["Pedro Cardozo", 11, "img/pedro cardoso 11.jpeg"],
    ["Santiago García",23 , "img/santiago garcia 23.jpeg"],
    ["Sergio Blanco", 14, "img/sergio blanco 14.jpg"],
    ["Thiago Borbas", 18, "img/thiago borbas18.jpeg"],
    ["Christian Stuani", 19, "img/stuani.jpg"],
    ["Pablo Granoche", 16, "img/granoche.jpg"],
    ["Alexander Medina", 26, "img/medina.jpg"],
    ["Germán Hornos",25, "img/hornos.jpeg"],
    ["Eliomar Marcon", 21, "img/eliomar.jpg"],
    ["Javier Chevantón", 33, "img/javier.jpg"],
    ["Gabriel Alvez", 24, "img/gabriel.jpeg"],
    ["Martín Rodríguez", 13, "img/martin.jpg"],
    ["Pablo Bengoechea", 10, "img/bengoechea.jpg"],
    ["Juan González", 16, "img/juan.jpg"],
    ["Darío Silva", 19, "img/ario.jpeg"],
    ["Wilmar Cabrera", 12, "img/wilmar.jpg"],
    ["Julio Dely", 16, "img/dely.jpg"],
    ["Adolfo Barán", 13, "img/barán.jpg"],
    ["Johnny Miqueiro", 7, "img/miqueiro.jpg"]
];



document.getElementById("jugar").addEventListener("click", jugar);
document.getElementById("volver").addEventListener("click", volver);
document.getElementById("mayor").addEventListener("click", mayor);
document.getElementById("menor").addEventListener("click", menor);

var i, j, imgSrc, imgElement1, texto1, tt1, g1, imgSrc2, imgElement2, texto2, tt2, g2, puntaje = 0;
var preguntaActual = 0;

function seleccionarIndices() {
    i = Math.floor(Math.random() * arraycopia.length);
    do {
        j = Math.floor(Math.random() * arraycopia.length);
    } while (i === j);
}

function jugar() {
    arraycopia = [...arrayimagenes];
    seleccionarIndices();

    imgSrc = arraycopia[i][2];
    imgElement1 = document.getElementById("img1");
    texto1 = arraycopia[i][0];
    tt1 = document.getElementById("txt1");
    g1 = arraycopia[i][1];

    imgSrc2 = arraycopia[j][2];
    imgElement2 = document.getElementById("img2");
    texto2 = arraycopia[j][0];
    tt2 = document.getElementById("txt2");
    g2 = arraycopia[j][1];

    document.getElementById("inicio").style.display = "none";
    document.getElementById("maain").style.display = "flex";
    document.getElementById("abc").style.display = "flex";

    imgElement1.src = imgSrc;
    tt1.innerText = texto1 + " hizo: " + g1 + " goles";

    imgElement2.src = imgSrc2;
    tt2.innerText = texto2 + " hizo: ";

    arraycopia.splice(i, 1);
}

function volver() {
    arraycopia = [...arrayimagenes];
    document.getElementById("inicio").style.display = "block";
    document.getElementById("maain").style.display = "none";
    document.getElementById("abc").style.display = "none";
    document.getElementById("fin").style.display = "none";
    puntaje = 0;
    seleccionarIndices();
    actualizarElementos();
}

function terminarjuego() {
    document.getElementById("inicio").style.display = "none";
    document.getElementById("maain").style.display = "none";
    document.getElementById("abc").style.display = "none";
    document.getElementById("puntuacion").innerText = "Tu puntuación es: " + puntaje;
    document.getElementById("fin").style.display = "block";
    document.getElementById("numero").value = puntaje;

    $.ajax({
        url: 'guardar.php',
        type: 'POST',
        data: { numero: puntaje },
        success: function(response) {
            console.log('Puntaje enviado correctamente.');
        },
        error: function(xhr, status, error) {
            console.error('Error al enviar el puntaje:', error);
        }
    });
}

function actualizarElementos() {
    imgSrc = arraycopia[i][2];
    imgElement1.src = imgSrc;
    texto1 = arraycopia[i][0];
    tt1.innerText = texto1 + " hizo: " + g1 + " goles";

    imgSrc2 = arraycopia[j][2];
    imgElement2.src = imgSrc2;
    texto2 = arraycopia[j][0];
    tt2.innerText = texto2 + " hizo: " + g2 + " goles";
}

function moverYActualizar(orientacion) {
    var transicionClase = (orientacion === 'horizontal') ? 'transicion-horizontal' : 'transicion-vertical';
    var resetearClase = (orientacion === 'horizontal') ? 'resetear-posicion-horizontal' : 'resetear-posicion-vertical';

    document.getElementById("player2").classList.add(transicionClase);
    document.getElementById("player1").classList.add(transicionClase);

    setTimeout(function() {
        imgElement1.src = imgSrc2;
        tt1.innerText = texto2 + " hizo: " + g2 + " goles";
        g1 = g2;

        document.getElementById("player2").classList.add('ocultar');

        var m = Math.floor(Math.random() * arraycopia.length);
        imgSrc2 = arraycopia[m][2];
        imgElement2.src = imgSrc2;
        texto2 = arraycopia[m][0];
        tt2.innerText = texto2 + " hizo:";
        g2 = arraycopia[m][1];
        arraycopia.splice(m, 1);

        document.getElementById("player1").classList.remove(transicionClase);
        document.getElementById("player1").classList.add(resetearClase);
        document.getElementById("player2").classList.remove(transicionClase, 'ocultar');
        document.getElementById("player2").classList.add(resetearClase);

        setTimeout(function() {
            document.getElementById("player1").classList.remove(resetearClase);
            document.getElementById("player2").classList.remove(resetearClase);
        }, 50);
    }, 500);
}

function detectarOrientacion() {
    return (window.innerWidth > window.innerHeight) ? 'horizontal' : 'vertical';
}

function mayor() {
    if ((g2 >= g1) && (arraycopia.length > 0)) {
        moverYActualizar(detectarOrientacion());
        puntaje++;
    } else {
        terminarjuego();
    }

}

function menor() {
    if ((g2 <= g1) && (arraycopia.length > 0)) {
        moverYActualizar(detectarOrientacion());
        puntaje++;
    } else {
        terminarjuego();
    }
}



