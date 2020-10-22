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

$liga = $_POST['tournament-name'];
$clave = $_POST['tournament-pass'];
$organizador = $_SESSION['usuario'];
$rol = $_SESSION['rol'];
$estado = "inactivo";

$br = chr(13).chr(10);
// Creo Torneos
$ligas_fichero = fopen("ligas.txt","a+");
$string = fread($ligas_fichero, filesize("ligas.txt"));
$lines = explode($br, $string);
$flag = 0;

for ($i=0; $i < count($lines)-1; $i++) {
    $palabras = explode("|", $lines[$i]);
    if ($liga == $palabras[1]) {
        echo "Éste nombre de liga ya está en uso, intente con otro.";
        header("refresh:2; url= add-liga.php"); 
        $flag = 1;
    break;
    }
    else {
        $flag = 0;
    }
}

if ($flag == 0) {
    $liga_id = count($lines)-1;
    $fecha_inicial = "0";
    $linea = $liga_id."|".$liga."|".$organizador."|".$estado."|".$fecha_inicial."|".$clave.$br;
    fwrite($ligas_fichero, $linea);
    echo "Liga registrada exitosamente.";
    $_SESSION['liga_id'] = $liga_id;
    $_SESSION['liga'] = $liga;
    $_SESSION['fecha-ini'] = $fecha_inicial;
    $_SESSION['estado'] = $estado;
    $_SESSION['liga-owner'] = $organizador;
    $_SESSION['liga-clave'] = $clave;


    
}
fclose($ligas_fichero);

//Creo tabla Torneo-Usuarios
$tor_usuarios = fopen("usuarioxtorneo.txt","a+");
$uxt_string = fread($tor_usuarios, filesize("usuarioxtorneo.txt"));
$uxt_lines = explode($br, $uxt_string);
$uxt_id = "";
$user_id = "";
//Tomo la relación con usuarios. (ID_Usuario)

$users_log = fopen("registro.txt", "r");
$users_string = fread($users_log, filesize("registro.txt"));

$users_lineas = explode($br, $users_string);
$uflag = 0;
for ($i = 0; $i < count($users_lineas)-1; $i++) {
    
    $users_palabras = explode("|", $users_lineas[$i]);

    if ($organizador == $users_palabras[1]){
        $user_id = $users_palabras[0];
        $uflag = 1;
    break;
    }
    else {
        $uflag = 0;
    }

}
if ($uflag == 0) {
    echo "Problemas al correlacionar archivo.";
}
//Tomo la relación con Ligas. (ID_Torneo)

$ligas_log = fopen("ligas.txt", "r");
$ligas_string = fread($ligas_log, filesize("ligas.txt"));

$ligas_lineas = explode($br, $ligas_string);
$lflag = 0;
for ($i = 0; $i < count($ligas_lineas)-1; $i++) {
    
    $ligas_palabras = explode("|", $ligas_lineas[$i]);

    if ($liga == $ligas_palabras[1]){
        $uxt_id = $users_palabras[0];
        $lflag = 1;
    break;
    }
    else {
        $lflag = 0;
    }
}
if ($lflag == 0) {
    echo "Problemas al correlacionar archivo.";
}
$uxt_rol = $rol;
$nuxt_line = $uxt_id."|".$user_id."|".$uxt_rol.$br;
fwrite($tor_usuarios, $nuxt_line);
fclose($tor_usuarios);

// $nueva_liga = fopen("$liga.txt","a+");
// $nliga_line = $organizador."|".$rol.$br;
// fwrite($nueva_liga, $nliga_line);
// fclose($nueva_liga);
header("refresh:4; url= home.php");
?>
            </div>
        </div>
    </body>
</html>