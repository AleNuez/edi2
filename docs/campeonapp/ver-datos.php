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
$liga = $_SESSION['current-tournament'];
 }
$br = chr(13).chr(10);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Ver Datos | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1>Informacion</h1>
            <div class="main-tournaments-view">
                <div class="tournaments-container">
                    <?php
             
             $log = fopen("ligas.txt", "r");
             $string = fread($log, filesize("ligas.txt"));
            $lineas = explode($br, $string);
            $flag_one = 0;
            for ($i = 0; $i < count($lineas)-1; $i++) {
             $palabras = explode("|", $lineas[$i]);
            if ($liga == $palabras[1]) {
    
                 $liga_name = $palabras[1];
                 $liga_org = $palabras[2];
                 $liga_estado = $palabras[3];
                 $liga_clave = $palabras[5];

                $flag_one = 1;
                break;
            }
            }
    
            if ($flag_one == 0) {
                echo "Error al recibir los datos.";
            }

            echo "<b>Torneo:</b> ".$liga_name."<br>";
            echo "<b>Organizador:</b> ".$liga_org."<br>";
            echo "<b>Estado de la competencia:</b> ".$liga_estado."<br>";
            echo "<b>Clave de torneo:</b> ".$liga_clave."<br>";


        ?>

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