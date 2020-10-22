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

$_SESSION['liga_name'] = $_POST['search-liga-name-field'];
$_SESSION['liga_pass'] = $_POST['search-liga-password-field'];
$_SESSION['buscado'] = 1;
echo "Buscando Ligas...";
header("refresh:1; url= search-liga.php"); 
?>
            </div>
        </div>
    </body>
</html>