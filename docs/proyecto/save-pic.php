<?php

include('conexion.php');
session_start();
$user = $_SESSION['username'];
$Img = addslashes(file_get_contents($_FILES['Imagen']['tmp_name'])); //tmp_name: nombre del arhivo en el SO

$saveImg = "UPDATE users SET image='$Img' WHERE user = '$user'";

$resultadosave = $conexion->query($saveImg);

if($resultadosave){
    echo "Imagen Subida Exitosamente";
    sleep(3);
    header("location: profile-doc.php");
} else {
    echo "Error al guardar";
    sleep(3);
    header("location: profile-doc.php");
    
}

?>