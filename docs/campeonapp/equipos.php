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

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>
            Equipos | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1>Equipos</h1>
            <h2><?php echo $liga?></h2>
            <div class="main-tournaments-view">
                <div class="tournaments-container">
                    <?php

        // NUMERAR LOS EQUIPOS PERTENECIENTES A LA LIGA ACTUAL
        $salto = chr(13).chr(10);
        $equipos = fopen("equipos.txt", "r");
        $stringubi = fread($equipos, filesize("equipos.txt"));
        $linubis = explode($salto, $stringubi);
        $flagubi = 0;
        for ($i = 0; $i < count($linubis)-1; $i++) {
        $words = explode("|", $linubis[$i]);
        if ($liga == $words[1]){
        
       $numerar_team = $words[0];
       
//        echo "<form action=\"redirect.php\" method=\"POST\">
// <input type=\"submit\" value=\"$numerar_liga\" name=\"$numerar_liga\"></form>";
        echo "<p>".$numerar_team."</p>";
       $flagubi = 1;
     
         }
       }
       if ($flagubi == 0) {
        echo "No hay equipos disponibles.";
       }


            // RESTRINGIR BOTON AGREGAR EQUIPO A PARTICIPANTES
        if ( $rol == "Organizador") {
            // $br = chr(13).chr(10);
            // $liga_fichero = fopen("$liga.txt","a+");
            // $string = fread($liga_fichero, filesize("$liga.txt"));
            // $lines = explode($br, $string);
            // $flag = 0;
            // for ($i=0; $i < count($lines)-1; $i++) {
            // $palabras = explode("|", $lines[$i]);
            // if ($usuario == $palabras[0] or $rol == "Organizador") { 
            // $flag = 1;
            ?>
                    <div class="only-organizer">

                        <button>
                            <a href="add-team.php">Agregar Equipo</a>
                        </button>

                    </div>
                <?php
        }
        //     break;
        // }
        // else {
        // $flag = 0;
        // }   
        // }
        // if ($flag == 0) {
        //     echo "<button><a href=\"anotarse.php\">Participar</a></button>";
        // }   
        // fclose($liga_fichero);
        // }
        ?>

                </div>

                <button>
                    <a href="torneo-main.php">Volver</a>
                </button>
            </div>

        </div>
    </body>
</html>