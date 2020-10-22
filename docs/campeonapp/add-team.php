<?php
session_start();
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
        <title>Nuevo Equipo | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <?php echo $welcome; ?>
            <h1>Agregar equipo a la liga</h1>
            <div class="main-tournaments-view">

                <div class="only-organizer">

                    <form action="create-team.php" method="POST">
                        <label for="team-name">Nombre</label>
                        <input name="team-name" type="text" required="required">

                        <input type="submit" value="Crear">
                    </form>

                </div>

            </div>

        </div>
    </body>
</html>