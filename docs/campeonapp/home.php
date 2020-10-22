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
 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Home | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1>Campeonapp</h1>
            <div class="main-tournaments-view">
                <div class="tournaments-container">
                    <?php
         
        if ($rol == "Organizador") {
         $br = chr(13).chr(10);
         $log = fopen("ligas.txt", "r");
         $string = fread($log, filesize("ligas.txt"));
         $lineas = explode($br, $string);
         $flag = 0;
         for ($i = 0; $i < count($lineas)-1; $i++) {
          $palabras = explode("|", $lineas[$i]);
            if ($usuario == $palabras[2]){
                 
                $numerar_liga = $palabras[1];
                
                echo "<form action=\"redirect.php\" method=\"POST\">
    <input type=\"submit\" value=\"$numerar_liga\" name=\"$numerar_liga\"></form>";
                // echo "<a href=\"torneo-main.php\">".$numerar_liga."</a></p>";
                $flag = 1;
              
            }
            }
            if ($flag == 0) {
            echo "No se ha unido a ningun torneo.";
            }
            fclose($log);
            }
            if ($rol == "Participante") {
                $flag_one = 0;
                if ( isset($_SESSION['buscado']) ) {
                    
                
                $br = chr(13).chr(10);
                $log = fopen("ligas.txt", "r");
                $string = fread($log, filesize("ligas.txt"));
                $lineas = explode($br, $string);
              
                for ($i = 0; $i < count($lineas)-1; $i++) {
                 $palabras = explode("|", $lineas[$i]);
                   if ($liga == $palabras[1]) {
                    //    echo "<a href=\"torneo-main.php\">".$palabras[0]."</a></p>";
                    $numerar_liga = $palabras[1];
                        
                    echo "<form action=\"redirect.php\" method=\"POST\">
                    <input type=\"submit\" value=\"$numerar_liga\" name=\"$numerar_liga\"></form>";
                       $flag_one = 1;
                       break;
                   }
                   }
                   }
                   if ($flag_one == 0 && isset($_SESSION['buscado'])) {
                   echo "No hay ningun torneo disponible.";
                   }
                
            }
         ?>

                </div>
                <div class="only-organizer">
                    <?php
    if ($rol == "Organizador"){
        echo "<div class=\"campo\"><button><a href=\"add-liga.php\">Agregar Liga</a></button></div>"; 
    }    
    ?>
                </div>
                <div class="campo">
                    <button>
                        <a href="search-liga.php">Buscar Torneos</a>
                    </button>
                </div>
                <div class="campo">
                    <button>
                        <a href="index.php">Salir</a>
                    </button>
                </div>

            </div>

        </div>
    </body>
</html>