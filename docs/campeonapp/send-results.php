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
session_start();
//usuario,clave,repita,rol
$r1 = $_POST['a'];
$r2 = $_POST['b'];
$r3 = $_POST['c'];
$r4 = $_POST['d'];

$n_teams = $_SESSION['no_teams'];
$fecha_anotar = $_SESSION['actual-fecha'];
$liga = $_SESSION['current-tournament'];
$liga_id = $_SESSION['liga_id'];



 $br = chr(13).chr(10);
 $tabla_fichero = fopen("tabla.txt","a+");
 $e_string = fread($tabla_fichero, filesize("tabla.txt"));
 $lines = explode($br, $e_string);
 

 switch ($n_teams) {
     case 3: 
         
    break;
     case 4: 
       
         for ($i = 0; $i < count($lines)-1; $i++) {
            $w_palabras = explode("|", $lines[$i]);
              if ($liga_id == $w_palabras[0] && $fecha_anotar == $w_palabras[1]) {
                    if ($w_palabras[6] == 1){
                        $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$r1."|".$w_palabras[4]."|".$r2."|".$w_palabras[6].$br;
                    }
                    if ($w_palabras[6] == 2){
                        $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$r3."|".$w_palabras[4]."|".$r4."|".$w_palabras[6].$br;
                    } 
                } else {
                $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$w_palabras[3]."|".$w_palabras[4]."|".$w_palabras[5]."|".$w_palabras[6].$br;
              }

              if ($i == 0) {
                  file_put_contents('tabla.txt', $newline);
              } else {
                  file_put_contents('tabla.txt', $newline, FILE_APPEND);
              } 
     }
    }   
    echo "Tabla actualizada.";
    // case 5: break;
    // case 6: break;
     // case 7: break;
    // case 8: break;
    // case 9: break;
    // case 10: break;

 fclose($tabla_fichero);
 if ($fecha_anotar <= $n_teams-1) {
 $_SESSION['new-fecha'] = $fecha_anotar+1;
}
    header("refresh:2; url= fixture.php"); 


?>
            </div>
        </div>
    </body>
</html>