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

$team = $_POST['team-name'];
$organizador = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$liga = $_SESSION['current-tournament'];


$br = chr(13).chr(10);
$teams_fichero = fopen("equipos.txt","a+");

$string = fread($teams_fichero, filesize("equipos.txt"));
$lines = explode($br, $string);
$flag = 0;

for ($i=0; $i < count($lines); $i++) {
    $palabras = explode("|", $lines[$i]);
    if ($team == $palabras[0]) {
        echo "Éste nombre de equipo ya está en uso, intente con otro.";
        header("refresh:2; url= add-team.php"); 
        $flag = 1;
    break;
    }
    else {
        $flag = 0;
    }
}

if ($flag == 0) {
    $linea = $team."|".$liga.$br;
    fwrite($teams_fichero, $linea);
    echo "Equipo registrado exitosamente.";
    


    header("refresh:3; url= equipos.php"); 
}
fclose($teams_fichero);


?>
            </div>
        </div>
    </body>
</html>