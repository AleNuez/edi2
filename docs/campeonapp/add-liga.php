<?php
session_start();
$welcome = "";
if (isset($_SESSION['rol']) == false) {

    header("refresh:0; url= forbidden.php");
}
else if ($_SESSION['rol'] == "Participante") {

        header("refresh:0; url= forbidden.php");
    } else {

        $welcome = $_SESSION['usuario']." (".$_SESSION['rol'].") <br>";

$rol = $_SESSION['rol'];
$usuario = $_SESSION['usuario'];

 }


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Nueva Liga | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php
    echo $welcome;
    ?>
            <h1>Nueva competición</h1>
            <div class="main-tournaments-view">

                <div class="only-organizer">

                    <form action="create-liga.php" method="POST">
                        <div class="campo">
                            <label for="tournament-name">Nombre</label><br>
                            <input name="tournament-name" type="text" required="required"></div>
                        <div class="campo">
                            <label for="tournament-pass">Clave de Liga Privada</label><br>
                            <input name="tournament-pass" type="text"></div>
                        <input type="submit" value="Crear">
                    </form>

                </div>

            </div>

        </div>
    </body>
</html>