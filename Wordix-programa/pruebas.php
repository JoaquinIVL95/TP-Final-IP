<?php

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
        "partida" => 11,
        "palabra" => "VERDE",
        "jugador" => "fede",
        "puntaje" => 0,
        "intento" => "No adivinó la palabra"
      ],
    ];
    return $coleccionPartidas;
  }

  /**
 *  Se asegura que el usuario ingrese un número que esté dentro de un rango
 * @param int $min, $max
 * @return int
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero

    $numero = trim(fgets(STDIN));

    if (is_numeric($numero)) { //determina si un string es un número. puede ser float como entero.
        $numero  = $numero * 1; //con esta operación convierto el string en número.
    }
    while (!(is_numeric($numero) && (($numero == (int)$numero) && ($numero >= $min && $numero <= $max)))) {
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
        if (is_numeric($numero)) {
            $numero  = $numero * 1;
        }
    }
    return $numero;
}
  

/**
 * Funcion para llamar datos de partidas jugadas
 * @param INT $numPartida
 */

 function llamarDatosPartidas (){
  /*STRING $partidasCargadas  */
      $partidasCargadas = cargarPartidas();

      echo "Elija una partida entre 1 y " . count($partidasCargadas) . "\n";

      $partidaValida = solicitarNumeroEntre(0 , count($partidasCargadas)-1); 
      
     

        
          echo "****************************************\n";
          echo "Partida WORDIX " . $partidasCargadas[$partidaValida-1]["partida"] . ": Palabra: " . $partidasCargadas[$partidaValida-1]["palabra"] . "\n";
          echo "Jugador: " . $partidasCargadas[$partidaValida-1]["jugador"] . "\n";
          echo "Puntaje: " . $partidasCargadas[$partidaValida-1]["puntaje"] . " puntos \n";
          echo "Intentos: " . $partidasCargadas[$partidaValida-1]["intento"] . "\n";
          echo "****************************************\n";
          
        
      

    }
    

        // foreach ($partidasCargadas as $partidas){
        //   echo "************************************\n";
        //   echo "Partida WORDIX " . $partidas["partida"] . ": palabra: " . $partidas["palabra"] . "\n";
        //   echo "Jugador: " . $partidas["jugador"] . "\n";
        //   echo "Puntaje: " . $partidas["puntaje"] . "puntos \n";
        //   echo "Intentos: " . $partidas["intento"] . "\n";
        //   echo "************************************\n";
        //   echo "\n";

        // }
        
        
    


// echo "ingrese numero de partida que desea ver: ";
// $partidaNum= trim(fgets(STDIN));
// $datos = llamarDatosPartidas($partidaNum);

$coleccionPalabras = [
  "MUJER", "QUESO", "FUEGO", "CASAS", "RASGO",
  "GATOS", "GOTAS", "HUEVO", "TINTO", "NAVES",
  "VERDE", "MELON", "YUYOS", "PIANO", "PISOS",
  "AVION", "ABETO", "BICHO", "CABRA", "CEJAS"
];

function agregarPalabra ($palabraNueva){

  

  array_push ($coleccionPalabras, $palabraNueva);

  return $coleccionPalabras;
}
$coleccionPalabras= agregarPalabra("ZAPAT");

echo $coleccionPalabras[count($coleccionPalabras)-1];

echo count($coleccionPalabras);