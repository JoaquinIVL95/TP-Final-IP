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
      "palabraWordix" => "QUESO",
      "jugador" => "fede",
      "puntaje" => 0,
      "intentos" => 0
    ],
    [
      "partida" => 2,
      "palabraWordix" => "MUJER",
      "jugador" => "joaquin",
      "puntaje" => 14,
      "intentos" => 2
    ],
    [
      "partida" => 3,
      "palabraWordix" => "FUEGO",
      "jugador" => "fede",
      "puntaje" => 0,
      "intentos" => 0
    ],
    [
      "partida" => 4,
      "palabraWordix" => "CASAS",
      "jugador" => "fede",
      "puntaje" => 10,
      "intentos" => 2
    ],
    [
      "partida" => 5,
      "palabraWordix" => "QUESO",
      "jugador" => "moni",
      "puntaje" => 10,
      "intentos" => 6
    ],
    [
      "partida" => 6,
      "palabraWordix" => "PIANO",
      "jugador" => "moni",
      "puntaje" => 12,
      "intentos" => 4
    ],
    [
      "partida" => 7,
      "palabraWordix" => "MELON",
      "jugador" => "joaquin",
      "puntaje" => 0,
      "intentos" => 0
    ],
    [
      "partida" => 8,
      "palabraWordix" => "CABRA",
      "jugador" => "joaquin",
      "puntaje" => 12,
      "intentos" => 4
    ],
    [
      "partida" => 9,
      "palabraWordix" => "CEJAS",
      "jugador" => "moni",
      "puntaje" => 13,
      "intentos" => 3
    ],
    [
      "partida" => 10,
      "palabraWordix" => "ABETO",
      "jugador" => "joaquin",
      "puntaje" => 13,
      "intentos" => 2
    ],
    [
      "partida" => 11,
      "palabraWordix" => "VERDE",
      "jugador" => "fede",
      "puntaje" => 0,
      "intentos" => 0
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

  if ($numPartida > 0){
    echo "****************************************\n";
    echo "Partida WORDIX " . $partidasCargadas[$numPartida]["partida"] . ": Palabra: " . $partidasCargadas[$numPartida]["palabraWordix"] . "\n";
    echo "Jugador: " . $partidasCargadas[$numPartida]["jugador"] . "\n";
    echo "Puntaje: " . $partidasCargadas[$numPartida]["puntaje"] . " puntos \n";
    if ($partidasCargadas[$numPartida]["intentos"] == 0){
      echo "Intentos: no adivinó la palabra\n";
    }else{
      echo "Intentos: Adivino la palabra en " . $partidasCargadas[$numPartida]["intentos"] . " intentos\n";
    }
    
    echo "****************************************\n";
  }else{
    echo "El jugador aun no gano una partida. Elija otro jugador o juege una nueva partida.\n";
  }
  
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
 * @param string $nomJugadorValid
 * @param array $partGuardadas
 */
function mostrarResultJug($nomJugadorValid, $partGuardadas) {
    /* array $resumenJug, int $partidas, $puntajeTotal, $victorias, $puntObtenido
    * int $inten1, $inten2, $inten3, $inten4, $inten5, $inten6, $ganoIntento
    * float $porcVict */

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
        if ($partGuardadas[$i]["jugador"] == $nomJugadorValid) {
            $partidas += 1;
            $puntObtenido= $partGuardadas[$i]["puntaje"];
            if ($puntObtenido > 0) {
                $victorias += 1;
                $puntajeTotal += $puntObtenido;
                $ganoIntento = $partGuardadas[$i]["intentos"];

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

    $porcVict = $victorias / $partidas * 100;
    $resumenJug ["Jugador"] = $nomJugadorValid;
    $resumenJug ["Partidas"] = $partidas;
    $resumenJug ["Puntaje Total"] = $puntajeTotal;
    $resumenJug ["Victorias"] = $victorias;
    $resumenJug ["Porcentaje victorias"] = $porcVict;
    $resumenJug ["Intento 1"] = $inten1;
    $resumenJug ["Intento 2"] = $inten2;
    $resumenJug ["Intento 3"] = $inten3;
    $resumenJug ["Intento 4"] = $inten4;
    $resumenJug ["Intento 5"] = $inten5;
    $resumenJug ["Intento 6"] = $inten6;

    echo "***********************************************\n";
    echo "RESUMEN DEL JUGADOR\n";
    foreach ($resumenJug as $clave => $valor) {
        if ($clave == "Intento 1"){
            echo "Adivinadas: \n";
        }

        if ($clave == "Porcentaje victorias"){
            echo $clave.": ".$valor."% \n";
        } else {
            echo $clave.": ".$valor."\n";
        }

    }
    echo "***********************************************\n";
}

/** Solicitar nombre de jugador y devolverlo solo cuando este sea válido (Debe empezar con una letra
 * y no puede ser un string vacío
 * @return string
 */
function solicitarNombre () {

    do {
        echo "Ingrese el nombre del jugador. Debe comenzar  con una letra: \n";
        $nombreVal = trim(fgets(STDIN));
        $longNom = strlen($nombreVal);

    } while (!$longNom > 0 || !esPalabra($nombreVal[0]));
    return strtolower($nombreVal);
}

/** Buscar el nombre ingresado por el usuario en el arreglo de partidas y devolver
 * si se encuentra o no en las partidas jugadas
 * @return boolean
 */
function buscarNombJugador($nombrePedido, $partGuardadas) {

    $i = 0;
    $n = count($partGuardadas);
    $encontrado = false;

    while ($i < $n && !$encontrado) {
        if ($partGuardadas[$i]["jugador"] == $nombrePedido){
            $encontrado = true;
        }
        $i += 1;
    }
    return $encontrado;
}

/**
 * Comparar los valores de la clave "jugador" de los arreglos a y b y después comparar los valores
 * de la clave "palabra". Retorna un valor según el resultado de la comparación
 * @param string $a
 * @param string $b
 * @return int
 */
function comparador($a, $b) {
    if (strcmp($a["jugador"], $b["jugador"]) == 0) {
        return strcmp($a["palabraWordix"], $b["palabraWordix"]);
    }
    return strcmp($a["jugador"], $b["jugador"]);
}

/** Ordenar la coleccion de partidas de acuerdo a la funcion comparador que compara los valores de las
 * claves "jugador" y "palabra"
 * @param array $partGuardadas
 */
function ordenPorJugador($partGuardadas) {
    uasort($partGuardadas,"comparador");
    print_r($partGuardadas);
}

/**
 * Retorna true si una palabra está dentro de un arreglo de palabras
 * @param string $palabra
 * @param array $palabras
 * @return boolean
 */
function estaDentroDelArreglo ($palabra, $palabras){
// int $i
// boolean $estaDentro
  $estaDentro = false;
  $i = 0;
  while($i< count($palabras) && !$estaDentro){
    if($palabras[$i] == $palabra){
      $estaDentro= true;
    }
    $i++;
  }
  return $estaDentro;
}

/**
 * guarda las palabras ya jugadas por el jugador dentro de otro arreglo
 * @param string $persona
 * @param array $arregloDePartidas
 * @return array
 */
function obtenerPalabrasJugadas ( $persona, $arregloDePartidas ){
  // array $palabrasJugadas
  $palabrasJugadas = [];
  foreach($arregloDePartidas as $partidaJugada) {
    if($partidaJugada["jugador"] == $persona){
      array_push($palabrasJugadas,$partidaJugada["palabraWordix"]);
    }
  }
  return $palabrasJugadas;
}


/**************************************/
/*********** PROGRAMA PRINCIPAL *******/
/**************************************/

//Declaración de variables:

// boolean $salir, $palabraValida
// int $opcion, $numeroElegido, $numeroAleatorio, $i, $nroDePartida, $ultimaPartida
// array $partidas, $palabras, $partida, $palabrasJugadas
// string $jugador, $palabraElegida, $palabraAleatoria, $palabraPorAgregar

//Inicialización de variables:
$salir = true;
$partidaValida = true;
//Precargar estructuras
$partidas = cargarPartidas();
$palabras = cargarColeccionPalabras();

//Proceso:

//Inicia el juego
while($salir){
  $opcion = seleccionarOpcion();
  switch ($opcion) {
    //PRIMER CASO
    case 1: 
      
      $palabraValida = true;
      $jugador = solicitarNombre();
      $palabrasJugadas = obtenerPalabrasJugadas($jugador, $partidas);
      $i = 0;

      while($palabraValida){
        echo "Elija un número entre 1 y " . count($palabras) . "\n";
        $numeroElegido = solicitarNumeroEntre(1, count($palabras));
        $palabraElegida = $palabras[$numeroElegido -1];
        if(!estaDentroDelArreglo($palabraElegida,$palabrasJugadas)){
          $palabraValida = false;
        }
        // for($i = 0; $i < count($partidas); $i++){
        //   for($j = 0; $j < count($palabrasJugadas); $j++){
        //     if($partidas[$i]["jugador"] == $jugador){
        //       if($partidas[$i]["palabraWordix"] != $palabrasJugadas[$j]){
                
        //         $palabraValida = false; 
        //         echo $palabraValida;
        //       }else {
        //         $palabraValida = true;
        //       }
        //     }
        //   }
        // }
      }
      $ultimaPartida = count($partidas);
      $partida = jugarWordix($palabraElegida,$jugador);
      $partida["partida"] = $ultimaPartida +1;
      array_push($partidas, $partida);
      break;

    //SEGUNDO CASO
    case 2: 
      $jugador = solicitarNombre();
      $palabraValida = true;
      $palabrasJugadas = obtenerPalabrasJugadas($jugador, $partidas);
      while($palabraValida){
        $numeroAleatorio = rand(0,count($palabras)-1);
        $palabraAleatoria = $palabras[$numeroAleatorio];
        if(!estaDentroDelArreglo($palabraAleatoria,$palabrasJugadas)){
          $palabraValida = false;
        }
      }
      $ultimaPartida = count($partidas);
      $partida = jugarWordix($palabraAleatoria,$jugador);
      $partida["partida"] = $ultimaPartida +1;
      array_push($partidas, $partida);
      break;

    //TERCER CASO
    case 3: 
      echo "Ingrese un número entre 1 y " . count($partidas) . " de la partida que quiere ver \n";
      $nroDePartida = solicitarNumeroEntre(1, count($partidas));
      llamarDatosPartidas($nroDePartida-1,$partidas);
      break;

    //CUARTO CASO
    case 4: 
      $jugador = solicitarNombre();
      $esValido = buscarNombJugador($jugador,$partidas);
      if ($esValido) {
          $nroDePartida = primeraPartidaGanada($jugador, $partidas);
          llamarDatosPartidas($nroDePartida, $partidas);
      } else {
        echo $jugador." no tiene ninguna partida jugada";
        }
      break;

    //QUINTO CASO
    case 5:
      $jugador = SolicitarNombre();
      $esValido = buscarNombJugador($jugador,$partidas);
      if ($esValido) {
          mostrarResultJug($jugador, $partidas);
      } else {
          echo $jugador." no tiene ninguna partida jugada";
      }
      break;

    //SEXTO CASO
    case 6: 
      ordenPorJugador($partidas);
      break;

    //SEPTIMO CASO
    case 7: 
      $palabraValida = true;
      $i = 0;
      while($palabraValida){
        $palabraPorAgregar = leerPalabra5Letras();
        if(!in_array(strtoupper($palabraPorAgregar), $palabras)){
          $palabraValida = false;
        }
      }
      $palabras = agregarPalabra(strtoupper($palabraPorAgregar),$palabras);
      break;

    //OCTAVO CASO
    case 8: 
      $salir = false;
      break;
    
    default:
      echo "Ha ocurrido un error";
      break;
  }
}

echo "\n\n\n¡Adios!\n\n\n";