<?php
include_once("wordix.php");



/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. mail. Usuario Github */
/* Vargas. Joaquin. Fai-4873. TUDW. joaquinivl95@gmail.com. JoaquinIVL95
Uñates, Federico. FAI - 4988. TUDW. fedee.unates.2001@gmail.com. FedeU18
Zuluaga, Peláez, Mónica. FAI- 4356. TUDW.  MoniZuluagaP
*/


/* ****COMPLETAR***** */


/**************************************/
/***** DEFINICION DE FUNCIONES ********/
/**************************************/

/**
 * Obtiene una colección de palabras
 * @return array
 */
function cargarColeccionPalabras()
{
    $coleccionPalabras = [
        "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
        "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
        "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
        "AVION", "ABETO", "BICHO", "CABRA", "CEJAS"
    ];

    return ($coleccionPalabras);
}
/* ****COMPLETAR***** */

function cargarPartidas(){
  $coleccionPartidas = [
    [
      "partida" => 1,
      "palabra" => "QUESO",
      "jugador" => "fede",
      "puntaje" => 0,
      "intento" => "No adivinó la palabra"
    ],
    [
      "partida" => 2,
      "palabra" => "MUJER",
      "jugador" => "joaquin",
      "puntaje" => 16,
      "intento" => "Adivinó la palabra en 2 intentos"
    ],
    [
      "partida" => 3,
      "palabra" => "FUEGO",
      "jugador" => "fede",
      "puntaje" => 20,
      "intento" => "Adivinó la palabra en 1 intentos"
    ],
    [
      "partida" => 4,
      "palabra" => "CASAS",
      "jugador" => "fede",
      "puntaje" => 0,
      "intento" => "No adivinó la palabra"
    ],
    [
      "partida" => 5,
      "palabra" => "QUESO",
      "jugador" => "moni",
      "puntaje" => 6,
      "intento" => "Adivinó la palabra en 6 intentos"
    ],
    [
      "partida" => 6,
      "palabra" => "PIANO",
      "jugador" => "moni",
      "puntaje" => 10,
      "intento" => "Adivinó la palabra en 4 intentos"
    ],
    [
      "partida" => 7,
      "palabra" => "MELON",
      "jugador" => "joaquin",
      "puntaje" => 0,
      "intento" => "No adivinó la palabra"
    ],
    [
      "partida" => 8,
      "palabra" => "CABRA",
      "jugador" => "joaquin",
      "puntaje" => 10,
      "intento" => "Adivinó la palabra en 4 intentos"
    ],
    [
      "partida" => 9,
      "palabra" => "CEJAS",
      "jugador" => "moni",
      "puntaje" => 12,
      "intento" => "Adivinó la palabra en 3 intentos"
    ],
    [
      "partida" => 10,
      "palabra" => "ABETO",
      "jugador" => "joaquin",
      "puntaje" => 15,
      "intento" => "Adivinó la palabra en 2 intentos"
    ],
    [
      "partida" => 1,
      "palabra" => "VERDE",
      "jugador" => "fede",
      "puntaje" => 0,
      "intento" => "No adivinó la palabra"
    ],
  ];
  return $coleccionPartidas;
}





/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:


//Inicialización de variables:


//Proceso:

$partida = jugarWordix("MELON", strtolower("MaJo"));
//print_r($partida);
//imprimirResultado($partida);



/*
do {
    $opcion = ...;

    
    switch ($opcion) {
        case 1: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 1

            break;
        case 2: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 2

            break;
        case 3: 
            //completar qué secuencia de pasos ejecutar si el usuario elige la opción 3

            break;
        
            //...
    }
} while ($opcion != X);
*/
