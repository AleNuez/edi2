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
$liga = $_SESSION['current-tournament'];
$usuario = $_SESSION['usuario'];
$rol = $_SESSION['rol'];

$br = chr(13).chr(10);



//Creo/Leo tabla Torneo-Usuarios
$tor_usuarios = fopen("usuarioxtorneo.txt","a+");
$uxt_string = fread($tor_usuarios, filesize("usuarioxtorneo.txt"));
$uxt_lines = explode($br, $uxt_string);
$user_id = "";
$liga_id = "";

//Tomo la relación con usuarios. (ID_Usuario)

$users_log = fopen("registro.txt", "r");
$users_string = fread($users_log, filesize("registro.txt"));
$users_lineas = explode($br, $users_string);
$uflag = 0;
for ($i = 0; $i < count($users_lineas); $i++) {
    
    $users_palabras = explode("|", $users_lineas[$i]);

    if ($usuario == $users_palabras[1]){
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
for ($i = 0; $i <= count($ligas_lineas); $i++) {
    
    $ligas_palabras = explode("|", $ligas_lineas[$i]);

    if ($liga == $ligas_palabras[1]){
        $liga_id = $ligas_palabras[0];
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
// Veo si no está anotado, sino lo anoto
 for ($i=0; $i < count($uxt_lines)-1; $i++) {
    $palabras = explode("|", $uxt_lines[$i]);
     if ($user_id == $palabras[1]) {
         echo "ya anotado.";
         header("refresh:2; url= torneo-main.php"); 
         $flag = 1;
    break;
     }
     else {
         $flag = 0;
     }
 }

 if ($flag == 0) {
    $uxt_rol = $rol;
    $nuxt_line = $liga_id."|".$user_id."|".$uxt_rol.$br;
    fwrite($tor_usuarios, $nuxt_line);
     echo "Usuario anotado.";
   
     header("refresh:2; url= torneo-main.php"); 
 }
 fclose($tor_usuarios);

?>
            </div>
        </div>
    </body>
</html>