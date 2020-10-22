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
if (isset($_SESSION['liga_pass'])){
$liga_pass = $_SESSION['liga_pass'];
}
 }

 // Numerar teams desde acá

 // Numerar equipos 
 $numerar = intval(0);
 $salto = chr(13).chr(10);
 $equipos = fopen("equipos.txt", "r");
 $stringubi = fread($equipos, filesize("equipos.txt"));
 $linubis = explode($salto, $stringubi);
 $flagubi = 0;
 for ($i = 0; $i < count($linubis)-1; $i++) {
 $words = explode("|", $linubis[$i]);
 if ($liga == $words[1]){
      $numerar = $numerar+1;
      $flagubi = 1;
      $_SESSION['no_teams'] = $numerar;
}
}
fclose($equipos);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title><?php echo $liga?>
            | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1><?php echo $liga?></h1>
            <div class="main-tournaments-view">
                <div class="tournaments-container">
                <?php


        if ($rol == "Participante" or $rol == "Organizador") {
            $br = chr(13).chr(10);
            $liga_fichero = fopen("usuarioxtorneo.txt","a+");
            $string = fread($liga_fichero, filesize("usuarioxtorneo.txt"));
            $lines = explode($br, $string);
            $flag = 0;
            $user_id = "";
            // Tomar UserID del registro
                $users_log = fopen("registro.txt", "r");
                $users_string = fread($users_log, filesize("registro.txt"));
                $users_lineas = explode($br, $users_string);
                $uflag = 0;
                for ($i = 0; $i < count($users_lineas)-1; $i++) {
    
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
  //          
            for ($i=0; $i < count($lines)-1; $i++) {
            $palabras = explode("|", $lines[$i]);
            if ($user_id == $palabras[1]) { 
            $flag = 1;
            ?>
                    <div class="only-organizer">
                        <div class="campo">
                            <button>
                                <a href="equipos.php">Equipos</a>
                            </button>
                        </div>
                        <div class="campo">
                            <button>
                                <a href="ver-datos.php">Ver datos</a>
                            </button>
                        </div>
                        <div class="campo">
                            <button>
                                <a href="tabla.php">Tabla</a>
                            </button>
                        </div>
                        <div class="campo">
                            <button>
                                <a href="fixture.php">Fixture</a>
                            </button>
                        </div>
                    </div>
                <?php
            break;
        }
        else {
        $flag = 0;
        }   
        }
        if ($flag == 0) {
            echo "<button><a href=\"anotarse.php\">Participar</a></button>";
        }   
        fclose($liga_fichero);
        }
        ?>

                </div>

                <button>
                    <a href="home.php">Volver</a>
                </button>
            </div>

        </div>
    </body>
</html>