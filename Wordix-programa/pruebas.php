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
 * Funcion para llamar datos de partidas jugadas
 * @param INT $numPartida
 */

 function llamarDatosPartidas ($numPartida){
  /*STRING $partidasCargadas  */
      $partidasCargadas = cargarPartidas();

      $i = 0;
      for ($i = 0 ; $i < count($partidasCargadas); $i++){
        if($partidasCargadas[$i]["partida"] == $numPartida){
          echo "****************************************\n";
          echo "Partida WORDIX " . $partidasCargadas[$i]["partida"] . ": Palabra: " . $partidasCargadas[$i]["palabra"] . "\n";
          echo "Jugador: " . $partidasCargadas[$i]["jugador"] . "\n";
          echo "Puntaje: " . $partidasCargadas[$i]["puntaje"] . " puntos \n";
          echo "Intentos: " . $partidasCargadas[$i]["intento"] . "\n";
          echo "****************************************\n";
          
        }else{
          $i = $i +1;
        }
      }

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
        
        
    


echo "ingrese numero de partida que desea ver: ";
$partidaNum= trim(fgets(STDIN));
$datos = llamarDatosPartidas($partidaNum);