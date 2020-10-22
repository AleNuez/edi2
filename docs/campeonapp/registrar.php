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
$usuario = $_POST['reg-user-field'];
$clave = $_POST['reg-password-field'];
$rclave = $_POST['repeat-password-repeat-field'];
$rol = $_POST['rol-field'];

if ($clave == $rclave) {


$br = chr(13).chr(10);
$registro_fichero = fopen("registro.txt","a+");

$string = fread($registro_fichero, filesize("registro.txt"));
$lines = explode($br, $string);
$flag = 0;

for ($i=0; $i < count($lines)-1; $i++) {
    $palabras = explode("|", $lines[$i]);
    if ($usuario == $palabras[1]) {
        echo "Este usuario ya está en uso, intente con otro.";
        header("refresh:2; url= register.php"); 
        $flag = 1;
    break;
    }
    else {
        $flag = 0;
    }
}

if ($flag == 0) {
    $line_number = count($lines)-1;
    $linea = $line_number."|".$usuario."|".$clave."|".$rol.$br;
    fwrite($registro_fichero, $linea);
    echo "Usuario registrado exitosamente.";
    $_SESSION['usuario'] = $usuario;
    $_SESSION['clave'] = $clave;
    $_SESSION['rol'] = $rol;


    header("refresh:2; url= home.php"); 
}
fclose($registro_fichero);


}
else {
    echo "Las contraseñas deben ser iguales, intentelo de nuevo.";
    header("refresh:2; url= register.php"); 
}

?>
            </div>
        </div>
    </body>
</html>