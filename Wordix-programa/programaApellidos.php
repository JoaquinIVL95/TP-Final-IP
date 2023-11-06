<?php
include_once("wordix.php");

/**************************************/
/***** DATOS DE LOS INTEGRANTES *******/
/**************************************/

/* Apellido, Nombre. Legajo. Carrera. Mail. Usuario Github */
/* Vargas. Joaquin. Fai-4873. TUDW. joaquinivl95@gmail.com. JoaquinIVL95
Uñates, Federico. FAI - 4988. TUDW. fedee.unates.2001@gmail.com. FedeU18
Zuluaga, Peláez, Mónica. FAI- 4356. TUDW.  monicazul.desarrollo@gmail.com. MoniZuluagaP
*/


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
      "puntaje" => 14,
      "intento" => 2
    ],
    [
      "partida" => 3,
      "palabra" => "FUEGO",
      "jugador" => "fede",
      "puntaje" => 13,
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
      "puntaje" => 10,
      "intento" => 6
    ],
    [
      "partida" => 6,
      "palabra" => "PIANO",
      "jugador" => "moni",
      "puntaje" => 12,
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
      "puntaje" => 12,
      "intento" => 4
    ],
    [
      "partida" => 9,
      "palabra" => "CEJAS",
      "jugador" => "moni",
      "puntaje" => 13,
      "intento" => 3
    ],
    [
      "partida" => 10,
      "palabra" => "ABETO",
      "jugador" => "joaquin",
      "puntaje" => 13,
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
 * Funcion 6 para llamar datos de partidas jugadas
 * @param INT $numPartida
 * @param ARRAY $partidasCargadas
 */
function llamarDatosPartidas ($numPartida, $partidasCargadas){
  /*STRING $partidasCargadas  */
  

  // echo "Elija una partida entre 1 y " . count($partidasCargadas) . "\n";

      
  echo "****************************************\n";
  echo "Partida WORDIX " . $partidasCargadas[$numPartida]["partida"] . ": Palabra: " . $partidasCargadas[$numPartida]["palabra"] . "\n";
  echo "Jugador: " . $partidasCargadas[$numPartida]["jugador"] . "\n";
  echo "Puntaje: " . $partidasCargadas[$numPartida]["puntaje"] . " puntos \n";
  if ($partidasCargadas[$numPartida]["intento"] == 0){
    echo "Intentos: no adivinó la palabra\n";
  }else{
    echo "Intentos: Adivino la palabra en " . $partidasCargadas[$numPartida]["intento"] . " intentos\n";
  }
  
  echo "****************************************\n";
}

/**
 * Funcion 7 para agregar nuevas palabras al juego
 * @param STRING $palabraNueva
 * @param ARRAY $palabrasGuardadas
 * @return
 */
 function agregarPalabra ($palabraNueva,$palabrasGuardadas){
  /* STRING , $palabraNueva */


  array_push ($palabrasGuardadas, strtoupper($palabraNueva));

  return $palabrasGuardadas;
}

/**
 * Funcion 8 para determinar que partida fue la primera partida ganada de un jugador
 * @param STRING $nombreJugador
 * @param ARRAY $llamarPartidas
 * @return INT
 */
function primeraPartidaGanada($nombreJugador,$llamarPartidas){
  /*Variables internas INT $jugadorEncontrado*/
  $n = count($llamarPartidas);
  $i = 0;
  $encontrado = false;
  while($i<$n && $encontrado == false){

    if($llamarPartidas[$i]["jugador"] == $nombreJugador && $llamarPartidas[$i]["puntaje"] != 0){
      $jugadorEncontrado = $i;
      $encontrado = true;
    }
    $i = $i +1;
  }
  if (!$encontrado){
    $jugadorEncontrado = -1;
  }

  return $jugadorEncontrado;


}

/**
 * Muestra el menú de opciones y retorna el número de la opcion
 * @return int
 */
function seleccionarOpcion(){
  echo "\n\n\n****************************************\n";
  echo "Menú de opciones:\n";
  echo "1) Jugar con una palabra elegida\n";
  echo "2) Jugar con una palabra aleatoria\n";
  echo "3) Mostrar una partida\n";
  echo "4) Mostrar la primer partida ganadora\n";
  echo "5) Mostrar resumen de Jugador\n";
  echo "6) Mostrar listado de partidas ordenadas por nombre de jugador y por palabra\n";
  echo "7) Agregar una palabra\n";
  echo "8) Salir\n\n\n";
  echo "Ingrese una opción entre 1 y 8\n";
  echo "=> ";
  $numeroSolicitado = solicitarNumeroEntre(1, 8);
  return $numeroSolicitado;
}

/**
 * Muestra el resumen de un jugador
 * @param $nomJugador
 * @param $partGuardadas
 */
function mostrarResultJug($nomJugador, $partGuardadas) {
    /* array $resumenJug, int $partidas, $puntajeTotal, $victorias, $puntObtenido
    * int $intento, $inten1, $inten2, $inten3, $inten4, $inten5, $inten6
    * float $porceVict */

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
            if ($puntObtenido > 0) {
                $victorias += 1;
                $puntajeTotal += $puntObtenido;
                $ganoIntento = $partGuardadas[$i]["intento"];

                switch ($ganoIntento) {
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
        $resumenJug ["Adivinadas"] = "";
        $resumenJug ["Intento 1"] = $inten1;
        $resumenJug ["Intento 2"] = $inten2;
        $resumenJug ["Intento 3"] = $inten3;
        $resumenJug ["Intento 4"] = $inten4;
        $resumenJug ["Intento 5"] = $inten5;
        $resumenJug ["Intento 6"] = $inten6;

        echo "***********************************************\n";
        foreach ($resumenJug as $clave => $valor) {
            echo $clave.": ".$valor."\n";
        }
        echo "***********************************************\n";
    } else {
        echo "No hay registro de este jugador";
      }
}

/** Solicitar nombre de jugador y devolverlo solo cuando este sea válido
 * @return string
 */
function solicitarNombre() {
    /* string $nombreVal, int $longNom */

    do {
        echo "Ingrese el nombre del jugador. Debe comenzar  con una letra: \n";
        $nombreVal = trim(fgets(STDIN));
        $longNom = strlen($nombreVal);

    } while (!$longNom > 0 || !esPalabra($nombreVal[0]));
    return strtolower($nombreVal);
}

/**
 * Comparar los valores de la clave "jugador" de los arreglos a y b y después comparar los valores de la clave "palabra".
 * Retorna un valor según el resultado de la comparación
 * @param $a
 * @param $b
 * @return int
 */
function comparador($a, $b) {
    if (strcmp($a["jugador"], $b["jugador"]) == 0) {
        return strcmp($a["palabra"], $b["palabra"]);
    }
    return strcmp($a["jugador"], $b["jugador"]);
}

/** Ordenar la coleccion de partidas de acuerdo a la funcion comparador que compara los valores de las claves "jugador" y "palabra"
 * @param $partGuardadas
 */
function ordenPorJugador($partGuardadas) {
    uasort($partGuardadas,"comparador");
    print_r($partGuardadas);
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:
// boolean $salir
// int $opcion, $numeroElegido, $numeroAleatorio
// array $partidas, $palabras, $partida
// string $jugador, $palabraElegida, $palabraAleatoria

//Inicialización de variables:
$salir = true;
$partidaValida = true;
//Precargar estructuras
$partidas = cargarPartidas();
$palabras = cargarColeccionPalabras();
// print_r($partidas);


//Proceso:

echo primeraPartidaGanada("fede",$partidas);


//Inicia el juego
while($salir){
  $opcion = seleccionarOpcion();
  switch ($opcion) {
    case 1: 
      // $partida = jugarWordix("MELON", strtolower("MaJo"));

      $jugador = solicitarNombre();
      echo "Elija un número entre 1 y " . count($palabras) . "\n";
      $numeroElegido = solicitarNumeroEntre(1, count($palabras));
      $palabraElegida = $palabras[$numeroElegido -1];
      $partida = jugarWordix($palabraElegida,$jugador);
      break;
    case 2: 
      $jugador = solicitarNombre();
      $numeroAleatorio = rand(0,19);
      $palabraAleatoria = $palabras[$numeroAleatorio];
      $partida = jugarWordix($palabraAleatoria,$jugador);
      break;
    case 3: 
      echo "tercera opcion\n";

      break;
    case 4: 
      echo "cuarta opcion\n";

      break;
    case 5: 
      $jugador = SolicitarNombre();
      mostrarResultJug($jugador, $partidas);

      break;
    case 6: 
      ordenPorJugador($partidas);
      break;
    case 7: 
      echo "septima opcion\n";

      break;
    case 8: 
      $salir = false;
      break;
    
    default:
      echo "Ha ocurrido un error";
      break;
  }
}
// echo "\n\n\n";
// print_r($partida);
echo "\n\n\n¡Adios!\n\n\n";