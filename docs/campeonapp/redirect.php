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

foreach($_POST as $name => $content) {
    $torneo_name = $name;
 }

 echo "Bienvenido a ".$torneo_name;

 $_SESSION['current-tournament'] = $torneo_name;

header("refresh:1; url= torneo-main.php");
?>
            </div>
        </div>
    </body>
</html>