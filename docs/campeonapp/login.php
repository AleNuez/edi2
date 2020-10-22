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
$user = $_POST['main-user-field'];
$pass = $_POST['main-password-field'];

$br = chr(13).chr(10);
$log = fopen("registro.txt", "r");
$string = fread($log, filesize("registro.txt"));

$lineas = explode($br, $string);
$flag = 0;
for ($i = 0; $i < count($lineas)-1; $i++) {
    
    $palabras = explode("|", $lineas[$i]);

    if ($user == $palabras[1] && $pass == $palabras[2]){
        echo "Usuario Encontrado. Bienvenido.";
        $flag = 1;
        $_SESSION['usuario'] = $user;
        $_SESSION['clave'] = $pass;
        $_SESSION['rol'] = $palabras[3];
        header("refresh:2; url= home.php");
    break;
    }
    else {
        $flag = 0;
    }

}
if ($flag == 0) {
    echo "Ningun usuario encontrado, si no tiene cuenta, registrese.";
    header("refresh:2; url= index.php"); 
}

?>
            </div>
        </div>
    </body>
</html>