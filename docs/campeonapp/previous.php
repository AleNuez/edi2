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
$actual = $_SESSION['actual-fecha'];

$new_fecha = $actual-1;

 $_SESSION['new-fecha'] = $new_fecha;

header("refresh:0; url= fixture.php");
?>
            </div>
        </div>
    </body>
</html>