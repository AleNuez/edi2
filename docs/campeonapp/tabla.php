<?php
session_start();
$welcome = "";
if (isset($_SESSION['rol']) == false) {

    header("refresh:0; url= forbidden.php");
}
else {
  $welcome = $_SESSION['usuario']." (".$_SESSION['rol'].") <br>";

$rol = $_SESSION['rol'];
$usuario = $_SESSION['usuario'];
    if (isset($_SESSION['current-tournament'])){
        $liga = $_SESSION['current-tournament'];
        }
 }
 // GET LIGAID-FECHA (ligas)
 $br = chr(13).chr(10);
 $log = fopen("ligas.txt", "r");
 $string = fread($log, filesize("ligas.txt"));
$lineas = explode($br, $string);
for ($i = 0; $i < count($lineas)-1; $i++) {
 $palabras = explode("|", $lineas[$i]);
if ($liga == $palabras[1]) {
    $liga_id = $palabras[0]; 
    $liga_name = $palabras[1];
    $liga_fecha = $palabras[4];
    break;
}
}
fclose($log);
 // GET EQUIPO (equipos)
 $teams[] = "";
 $log2 = fopen("equipos.txt", "r");
 $string2 = fread($log2, filesize("equipos.txt"));
$lineas2 = explode($br, $string2);
$j = 0;
for ($i = 0; $i < count($lineas2)-1; $i++) {
 $palabras2 = explode("|", $lineas2[$i]);
if ($liga == $palabras2[1]) {
  
    $teams[$j] = $palabras2[0];
    $j++;
    }} fclose($log2);
    // GET 
//  $br = chr(13).chr(10);
//  $log = fopen("ligas.txt", "r");
//  $string = fread($log, filesize("ligas.txt"));
// $lineas = explode($br, $string);
// for ($i = 0; $i < count($lineas)-1; $i++) {
//  $palabras = explode("|", $lineas[$i]);
// if ($liga == $palabras[1]) {
//     $liga_id = $palabras[0]; 
//     $liga_name = $palabras[1];
//     $liga_fecha = $palabras[4];
//     break; }} fclose($log);
 // Create POS-G-E-P-PTS-J
 $cant_equipos = $_SESSION['no_teams'];

//    $br = chr(13).chr(10);
//   $tlog = fopen("tabla.txt", "r");
//   $tstring = fread($tlog, filesize("ligas.txt"));
//  $tlineas = explode($br, $tstring);
//  for ($i = 0; $i < count($tlineas)-1; $i++) {
//   $tpalabras = explode("|", $tlineas[$i]);

//  for ($i = 0; $i < $cant_equipos ; $i++) {
// switch ($i) {
//   case 1:
//     if ($liga_id == $tpalabras[0] && $liga_fecha == $tpalabras[1] && $tpalabras[6] == "1")
//     {
//       if ($tpalabras[3] > $tpalabras[5]) {
//         $uno_a = 
//       }

//     }
//     if ($liga_id == $tpalabras[0] && $liga_fecha == $tpalabras[1] && $tpalabras[6] == "2")
//     {
      
//     }

//   case 2:
  
//   case 3:
// }
 
//  }
// }
// fclose($tlog);

// feha 1 - donde equipo y equipo compartan fecha, liga y partido comparar Resultados
// si x > y xpuntos+3 ypuntos+0 y visceversa si empate x+1 y+1 x e y jugados+1 
// repetir fechas hasta que llegue a la cantidad de equipos-1 
// comparar puntos y ordenar de mayor a menor 


 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Tabla | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    
 
    
    ?>
            <h1>Tabla de Resultados</h1>
            <div class="main-tournaments-view">
                <div class="campo">
                    <table class="customTable">
                        <thead>
                            <tr>
                                <th>Pos</th>
                                <th>Equipo</th>
                                <th>G</th>
                                <th>E</th>
                                <th>P</th>
                                <th>Pts</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>X</td>
                                <td>Equipo X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>Equipo X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>Equipo X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
                            <tr>
                                <td>X</td>
                                <td>Equipo X</td>
                                <td>X</td>
                                <td>X</td>
                                <td>X</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="tournaments-container">
                    <div class="campo">
                        <button>
                            <a href="home.php">Exportar Tabla a Excel</a>
                        </button>
                    </div>
                    <div class="campo">
                        <button>
                            <a href="home.php">Exportar Tabla a PDF</a>
                        </button>
                    </div>
                </div>
                <div class="only-organizer"></div>
                <div class="campo">
                    <button>
                        <a href="torneo-main.php">Volver</a>
                    </button>
                </div>
            </div>

        </div>
    </body>
</html>