<?php
session_start();
$n_teams = $_SESSION['no_teams'];
$liga = $_SESSION['current-tournament'];

// get team names
        $salto = chr(13).chr(10);
        $equipos = fopen("equipos.txt", "r");
        $stringubi = fread($equipos, filesize("equipos.txt"));
        $linubis = explode($salto, $stringubi);
        $flagubi = 0;
        $found = 0;
        for ($i = 0; $i < count($linubis)-1; $i++) {
        $words = explode("|", $linubis[$i]);
        if ($liga == $words[1]){
       $team_name[$found] = $words[0];
       $flagubi = 1;
       $found = $found+1;
         }
       }
       if ($flagubi == 0) {
        echo "No hay equipos disponibles.";
       }
       fclose($equipos);
       // Busco Liga ID
         $br = chr(13).chr(10);
         $log = fopen("ligas.txt", "r");
         $string = fread($log, filesize("ligas.txt"));
         $lineas = explode($br, $string);
         $flag = 0;
         for ($i = 0; $i < count($lineas)-1; $i++) {
          $palabras = explode("|", $lineas[$i]);
            if ($liga == $palabras[1]){
                $liga_id = $palabras[0];
                $_SESSION['liga_id'] = $liga_id;
                $flag = 1;
            }
        }
            if ($flag == 0) {
            echo "No se ha podido leer el archivo ligas.txt .";
            }
            fclose($log);
//crear tabla con cada caso

$br = chr(13).chr(10);
$tabla_fichero = fopen("tabla.txt","a+");

$e_string = fread($tabla_fichero, filesize("tabla.txt"));
$lines = explode($br, $e_string);
$e_flag = 0;

// for ($i=0; $i < count($lines); $i++) {
//     $palabras = explode("|", $lines[$i]);
//     if ($team == $palabras[0]) {
//         header("refresh:2; url= add-team.php"); 
//         $e_flag = 1;
//     break;
//     }
//     else {
//         $e_flag = 0;
//     }
// }
// if ($e_flag == 0) {
//     $linea = $team."|".$liga.$br;
//     fwrite($tabla_fichero, $linea);
//     echo "Equipo registrado exitosamente.";
//     header("refresh:3; url= equipos.php"); 
// }



switch ($n_teams) {

    case 3: 
        $a = $team_name[0];
        $b = $team_name[1];
        $c = $team_name[2];
    break;
    case 4: 
        $a = $team_name[0];
        $b = $team_name[1];
        $c = $team_name[2];
        $d = $team_name[3];

   for ($fecha = 1; $fecha < $n_teams; $fecha++) {
           if ($fecha == 1 ) {
            $linea1 = $liga_id."|".$fecha."|".$a."|"."-"."|".$b."|"."-"."|"."1".$br;
            $linea2 = $liga_id."|".$fecha."|".$c."|"."-"."|".$d."|"."-"."|"."2".$br;
            }
           if ($fecha == 2 ) {
            $linea1 = $liga_id."|".$fecha."|".$c."|"."-"."|".$a."|"."-"."|"."1".$br;
            $linea2 = $liga_id."|".$fecha."|".$d."|"."-"."|".$b."|"."-"."|"."2".$br;
            }
           if ($fecha == 3 ) {
            $linea1 = $liga_id."|".$fecha."|".$a."|"."-"."|".$d."|"."-"."|"."1".$br;
            $linea2 = $liga_id."|".$fecha."|".$b."|"."-"."|".$c."|"."-"."|"."2".$br;
            }
            fwrite($tabla_fichero, $linea1);
            fwrite($tabla_fichero, $linea2);     
             
        }
    $message = "Encuentros generados exitosamente.";
    break;
    }
    
       

      
  
    // case 5: break;
    // case 6: break;
    // case 7: break;
    // case 8: break;
    // case 9: break;
    // case 10: break;

fclose($tabla_fichero);

$w_log = fopen("ligas.txt", "r+");
         $w_string = fread($w_log, filesize("ligas.txt"));
         $w_lineas = explode($br, $w_string);
         $w_flag = 0;
         $new_status = "en juego";
         for ($i = 0; $i < count($w_lineas)-1; $i++) {
          $w_palabras = explode("|", $w_lineas[$i]);
            if ($liga == $w_palabras[1]){
                $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$new_status."|"."1"."|".$w_palabras[5].$br;
                $w_flag = 1;
            } else {
                $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$w_palabras[3]."|".$w_palabras[4]."|".$w_palabras[5].$br;
                $w_flag = 1;
            }
            if ($i == 0) {
                file_put_contents('ligas.txt', $newline);
            } else {
                file_put_contents('ligas.txt', $newline, FILE_APPEND);
            }
            

        }
            if ($w_flag == 0) {
            echo "No se ha podido leer el archivo ligas.txt .";
            }
        fclose($w_log);


$_SESSION['generated'] = true; 
// header("refresh:3; url= fixture.php");

// cambiar estado a activo
//header("refresh:1; url= fixture.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <div class="center-message">
                <?php



echo $message;

header("refresh:3; url= fixture.php"); 


?>
            </div>
        </div>
    </body>
</html>