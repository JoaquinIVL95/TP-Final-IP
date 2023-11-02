<?php

function cargarPartidas(){
    $coleccionPartidas = [
      [
        "partida" => 1,
        "palabra" => "QUESO",
        "jugador" => "fede",
        "puntaje" => 0,
        "intento" => 0
      ],
      [
        "partida" => 2,
        "palabra" => "MUJER",
        "jugador" => "joaquin",
        "puntaje" => 16,
        "intento" => 2
      ],
      [
        "partida" => 3,
        "palabra" => "FUEGO",
        "jugador" => "fede",
        "puntaje" => 20,
        "intento" => 1
      ],
      [
        "partida" => 4,
        "palabra" => "CASAS",
        "jugador" => "fede",
        "puntaje" => 0,
        "intento" => 0
      ],
      [
        "partida" => 5,
        "palabra" => "QUESO",
        "jugador" => "moni",
        "puntaje" => 6,
        "intento" => 6
      ],
      [
        "partida" => 6,
        "palabra" => "PIANO",
        "jugador" => "moni",
        "puntaje" => 10,
        "intento" => 4
      ],
      [
        "partida" => 7,
        "palabra" => "MELON",
        "jugador" => "joaquin",
        "puntaje" => 0,
        "intento" => 0
      ],
      [
        "partida" => 8,
        "palabra" => "CABRA",
        "jugador" => "joaquin",
        "puntaje" => 10,
        "intento" => 4
      ],
      [
        "partida" => 9,
        "palabra" => "CEJAS",
        "jugador" => "moni",
        "puntaje" => 12,
        "intento" => 3
      ],
      [
        "partida" => 10,
        "palabra" => "ABETO",
        "jugador" => "joaquin",
        "puntaje" => 15,
        "intento" => 2
      ],
      [
        "partida" => 11,
        "palabra" => "VERDE",
        "jugador" => "fede",
        "puntaje" => 0,
        "intento" => 0
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

/**
 * Funcion para agregar nuevas palabras al juego
 * @param STRING $palabraNueva
 * @return
 */

function agregarPalabra ($palabraNueva){

  array_push ($coleccionPalabras, $palabraNueva);

  return $coleccionPalabras;
}

// $coleccionPalabras= agregarPalabra("ZAPAT");

// echo $coleccionPalabras[count($coleccionPalabras)-1];

// echo count($coleccionPalabras);






/**
 * Funcion para determinar que partida fue la primera partida ganada de un jugador
 * @param STRING $nombreJugador
 * @return INT
 */
function primeraPartidaGanada($nombreJugador){
    /*Variables internas */
    $llamarPartidas = cargarPartidas();

    foreach ($llamarPartidas as $indice => $jugadorEncontrado){
      if ($jugadorEncontrado["jugador"] == $nombreJugador && $jugadorEncontrado["puntaje"] != 0){
        $jugadorEncontrado = $indice;
        break;
      }else{
        $jugadorEncontrado = -1;
      }
    }
    return $jugadorEncontrado;
}


//$partidaGanada = primeraPartidaGanada("fede");
//echo $partidaGanada;


/**
 * Muestra el resumen de un jugador
 * @param $nomJugador
 * @param $partGuardadas
 */

function mostrarResuJug($nomJugador, $partGuardadas) {
    /* array $resumenJug, int $partidas, $puntajeTotal, $victorias, $puntObtenido
    * int $intento, $inten1, $inten2, $inten3, $inten4, $inten5, $inten6
    * float $porceVict
    */

    $resumenJug = [];
    $partidas = 0 ;
    $puntajeTotal = 0;
    $victorias = 0;
    $inten1 = 0;
    $inten2 = 0;
    $inten3 = 0;
    $inten4 = 0;
    $inten5 = 0;
    $inten6 = 0;

    for ($i = 0; $i < count($partGuardadas); $i++) {
        if ($partGuardadas[$i]["jugador"] == $nomJugador) {
            $partidas += 1;
            $puntObtenido= $partGuardadas[$i]["puntaje"];
            if ($puntObtenido != 0) {
                $victorias += 1;
                $puntajeTotal += $puntObtenido;
                $intento = $partGuardadas[$i]["intento"];

                switch ($intento) {
                    case 1:
                        $inten1 += 1;
                        break;
                    case 2:
                        $inten2 += 1;
                        break;
                    case 3:
                        $inten3 += 1;
                        break;
                    case 4:
                        $inten4 += 1;
                        break;
                    case 5:
                        $inten5 += 1;
                        break;
                    case 6:
                        $inten6 =+ 1;
                        break;
                }
            }
        }

    }
    if ($partidas > 0) {
        $porcVict = $victorias / $partidas * 100;
        $resumenJug ["Jugador"] = $nomJugador;
        $resumenJug ["Partidas"] = $partidas;
        $resumenJug ["Puntaje Total"] = $puntajeTotal;
        $resumenJug ["Victorias"] = $victorias;
        $resumenJug ["Porcentaje victorias"] = $porcVict;
        $resumenJug ["Adivinadas"]["Intento 1"] = $inten1;
        $resumenJug ["Adivinadas"]["Intento 2"] = $inten2;
        $resumenJug ["Adivinadas"]["Intento 3"] = $inten3;
        $resumenJug ["Adivinadas"]["Intento 4"] = $inten4;
        $resumenJug ["Adivinadas"]["Intento 5"] = $inten5;
        $resumenJug ["Adivinadas"]["Intento 6"] = $inten6;
        print_r($resumenJug) ;
    }
    else {
        echo "No hay registro de este jugador";
    }
}
mostrarResuJug("moni", cargarPartidas());