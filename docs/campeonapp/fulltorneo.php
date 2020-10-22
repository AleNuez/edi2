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
if (isset($_SESSION['rol']) == false) {

    header("refresh:0; url= forbidden.php");
} else {


echo "Todas las fechas han sido jugadas!";
$_SESSION['done'] = true;
header("refresh:2; url= torneo-main.php"); 
}
?>
            </div>
        </div>
    </body>
</html>