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

if (isset($_SESSION['liga_name']) == false) {
   
    $liga = "";
    $liga_pass = "";

}else {
    $liga = $_SESSION['liga_name'];
    $liga_pass = $_SESSION['liga_pass'];
}


 }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Buscar | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1>Buscar Torneo</h1>

            <div class="main-login-campos">

                <?php
        $flag = 0;
        if ( isset($_SESSION['buscado']) ) {
        ?>
                <p>Resultados:</p>
            <?php
        } else {
        ?>
                <p>Encontrá tu competencia:</p>
                <?php
        }
        if ( isset($_SESSION['buscado']) ) {
        $br = chr(13).chr(10);
        $log = fopen("ligas.txt", "r");
        $string = fread($log, filesize("ligas.txt"));
        $lineas = explode($br, $string);
      
        for ($i = 0; $i < count($lineas)-1; $i++) {
         $palabras = explode("|", $lineas[$i]);
           if ($liga == $palabras[1] && $liga_pass == $palabras[5]){
            //    echo "<a href=\"torneo-main.php\">".$palabras[0]."</a></p>";
            $numerar_liga = $palabras[1];
                
            echo "<form action=\"redirect.php\" method=\"POST\">
<input type=\"submit\" value=\"$numerar_liga\" name=\"$numerar_liga\"></form>";
               $flag = 1;
               break;
           }
           }
        }
           if ($flag == 0 && isset($_SESSION['buscado'])) {
           echo "No hay ningun torneo disponible.";
           }
        
      
        
        ?>
                <form action="results-liga.php" method="POST">
                    <div class="campo">
                        <label for="search-liga-name-field">Nombre de Torneo</label><br>
                        <input
                            class="main-user-field"
                            name="search-liga-name-field"
                            type="text"
                            required="required"></div>
                    <div class="campo">
                        <label for="search-liga-password-field">Clave</label><br>
                        <input
                            class="main-password-field"
                            name="search-liga-password-field"
                            type="text"></div>
                    <input type="submit" name="search-tournament" id="main-entrar">
                </form>
                <div class="campo">
                    <button>
                        <a href="home.php">Volver</a>
                    </button>
                </div>

            </div>

        </div>
    </body>
</html>