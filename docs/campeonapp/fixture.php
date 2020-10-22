<?php
session_start();
$welcome = "";
$liga_identi = "";
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
$fue_generado = false;
    if (isset($_SESSION['generated'])){
            $fue_generado = $_SESSION['generated'];
        }
//         if (isset($_SESSION['new-fecha'])){
//             if ($_SESSION['new-fecha'] == $numerar) {
//             $liga_fecha = $_SESSION['new-fecha'];
//         }
//  }

 // Chequear si la liga está en juego
 $w_log = fopen("ligas.txt", "r");
 $br = chr(13).chr(10);
         $w_string = fread($w_log, filesize("ligas.txt"));
         $w_lineas = explode($br, $w_string);
         $w_flag = 0;
         $new_status = "en juego";
         for ($i = 0; $i < count($w_lineas)-1; $i++) {
          $w_palabras = explode("|", $w_lineas[$i]);
          
            if ($liga == $w_palabras[1] && $w_palabras[3] == "en juego"){
                $fue_generado = true;
                $w_flag = 1;
                $liga_identi = $w_palabras[0];
            }  
        }
        $_SESSION['liga-id'] = $liga_identi;       
        fclose($w_log);
 // Conseguir datos de liga
        $br = chr(13).chr(10);
        $ligas_log = fopen("ligas.txt", "r");
        $l_string = fread($ligas_log, filesize("ligas.txt"));
        $l_lineas = explode($br, $l_string);
        $liga_fecha = 0;
        $flag_l = 0;
        for ($i = 0; $i < count($l_lineas)-1; $i++) {
        $l_palabras = explode("|", $l_lineas[$i]);
        if ($liga == $l_palabras[1]) {
            $liga_id = $l_palabras[0];
            $liga_name = $l_palabras[1];
            $liga_org = $l_palabras[2];
            $liga_estado = $l_palabras[3];
            if (isset($_SESSION['new-fecha'])){
                $liga_fecha = $_SESSION['new-fecha'];
            } else {
                $liga_fecha = $l_palabras[4];
            }
            
            $liga_clave = $l_palabras[5];
            $flag_l = 1;
           break;
       }
       }
       if ($flag_l == 0) {
           echo "Error al recibir los datos.";
       }
       $_SESSION['actual-fecha'] = $liga_fecha;
       fclose($ligas_log);
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

}
if (isset($_SESSION['new-fecha'])){
    if ($_SESSION['new-fecha'] == $numerar) {
        header("refresh:0; url= fulltorneo.php");
}
}
// Orden de equipos

        $br = chr(13).chr(10);
        $tabla_fichero = fopen("tabla.txt","a+");
        $e_string = fread($tabla_fichero, filesize("tabla.txt"));
        $lines = explode($br, $e_string);
        $slotA = "";
        $slotB = "";
        $slotC = "";
        $slotD = "";
        $e_flag = 0;
        for ($i = 0; $i < count($lines)-1; $i++) {
            $words = explode("|", $lines[$i]);
            if ($liga_identi == $words[0]) {
                if ($liga_fecha == $words[1]){
                    if ($words[6] == "1") {
                        $slotA = $words[2];
                        $p1 = $words[3];
                        $slotB = $words[4];
                        $p2 = $words[5];
                    }
                    if ($words[6] == "2") {
                        $slotC = $words[2];
                        $p3 = $words[3];
                        $slotD = $words[4];
                        $p4 = $words[5];
                    }
                } 
            }
         }
        
    //    switch ($liga_fecha) {
    //        case 1:
    //         echo "1";
    //        break;
    //        case 2:
    //         echo "2";
    //        break;
    //        case 3:
    //         echo "3";
    //        break;
    //    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Fixture | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
  
    ?>
            <h1>Calendario</h1>
            <div class="main-tournaments-view">
                <div class="tournaments-container">
                    <div class="fecha-selector">
                        <?php
         // veo si arrancó el torneo
           if ($fue_generado == true) {
        if ($liga_fecha > 1) {
        ?>
                        <form action="previous.php" method="POST">
                            <button type="submit" value="Ant"><</button></form> <?php } ?> <h2>Fecha <?php
                                echo $liga_fecha ?></h2> <?php if ($numerar%2 == 0) { if ($liga_fecha <
                                $numerar-1){ ?> <form action="next.php" method="POST"><button type="submit"
                                value="Sig">></button>
                        </form>
                    <?php
        }
        }else {
            if ($liga_fecha <= $numerar){
        ?>
                        <form action="next.php" method="POST">
                            <button type="submit" value="Sig">></button>
                        </form>
                        <?php
        }
        }
        
        ?>
                        <form action="send-results.php" method="POST">
                            <?php
         
         ?>
                        </div>
                        <div class="campo adjust-c">
                            <div style="display:flex;">
                                <p><?php echo $slotA ?></p><input
                                    class="marcador"
                                    min="0"
                                    max="20"
                                    name="a"
                                    size="2"
                                    type="number"
                                    value="<?php echo $p1 ?>"
                                    required="required"><br>
                                <input
                                    class="marcador"
                                    min="0"
                                    max="20"
                                    name="b"
                                    size="2"
                                    type="number"
                                    value="<?php echo $p2 ?>"
                                    required="required">
                                <p><?php echo $slotB ?></p>
                            </div>
                        </div>
                        <div class="campo adjust-c">
                            <div style="display:flex;">
                                <p><?php echo $slotC ?></p><input
                                    class="marcador"
                                    min="0"
                                    max="20"
                                    name="c"
                                    size="2"
                                    type="number"
                                    value="<?php echo $p3 ?>"
                                    required="required"><br>
                                <input
                                    class="marcador"
                                    min="0"
                                    max="20"
                                    name="d"
                                    size="2"
                                    type="number"
                                    value="<?php echo $p4 ?>"
                                    required="required">
                                <p><?php echo $slotD ?></p>
                            </div>
                        </div>
                        <input type="submit" value="Guardar Resultados">
                    </form>
                    <button>
                        <a href="home.php">Enviar fixture por Email</a>
                    </button>
                </div>

            <?php
            } else {
            // muestro cantidad de equipos disponilbes
           if ($numerar == 0) {
            echo "No hay equipos disponibles.";
           }
            // confirmo y basado en la cantidad de equipos genero las fechas
        ?>
                <div class="campo">
                    <p>Hasta el momento hay
                        <?php echo $numerar ?>
                        equipos anotados, ¿desea comenzar con esta cantidad?</p>
                </div>
                <div class="campo">
                    <button>
                        <a href="start.php">Generar enfrentamientos</a>
                    </button>
                </div>
            <?php
             }
             // Actualizar fecha de liga en ligas.txt
        $br = chr(13).chr(10);
        $u_ligas = fopen("ligas.txt", "a+");
        $u_string = fread($u_ligas, filesize("ligas.txt"));
        $u_lineas = explode($br, $u_string);
        $u_liga_fecha = 0;
        $flag_l = 0;

        for ($i = 0; $i < count($u_lineas)-1; $i++) {
            $w_palabras = explode("|", $u_lineas[$i]);
              if ($liga == $w_palabras[1]) {
                  
              $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$w_palabras[3]."|".$liga_fecha."|".$w_palabras[5].$br;
            
              } else {
              $newline = $w_palabras[0]."|".$w_palabras[1]."|".$w_palabras[2]."|".$w_palabras[3]."|".$w_palabras[4]."|".$w_palabras[5].$br;  
              }

              if ($i == 0) {
                  file_put_contents('ligas.txt', $newline);
              } else {
                  file_put_contents('ligas.txt', $newline, FILE_APPEND);
              } 
     }


        // Esto es para leer
    //     for ($i = 0; $i < count($l_lineas)-1; $i++) {
    //     $l_palabras = explode("|", $l_lineas[$i]);
    //     if ($liga == $l_palabras[1]) {
    //         $liga_id = $l_palabras[0];
    //         $liga_name = $l_palabras[1];
    //         $liga_org = $l_palabras[2];
    //         $liga_estado = $l_palabras[3];
    //         $liga_clave = $l_palabras[5];
    //         $flag_l = 1;
    //        break;
    //    }
    //    }
    //    if ($flag_l == 0) {
    //        echo "Error al recibir los datos.";
    //    }
    //    $_SESSION['actual-fecha'] = $liga_fecha;
    fclose($u_ligas);
    
        ?>
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