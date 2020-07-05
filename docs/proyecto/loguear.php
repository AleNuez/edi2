<?php

require 'conexion.php';
session_start();

$usuario = $_POST['user']; //usuario y clave enviado por usuario en el form
$clave = $_POST['pass'];
$error = TRUE; // Estatus de error para enviar mensaje bajo el formulario


$q = "SELECT COUNT(*) as contar from users where user ='$usuario' and password = '$clave' "; // Selecciona la fila que coincida con usuario y contraseña
$consulta = mysqli_query($conexion,$q); // une los datos de conexion + la consulta SQL
$array = mysqli_fetch_array($consulta); // guarda en una variable el resultado de la consulta

if($array['contar']>0){  // Si hay un resultado en el array... 
    $consul = "SELECT * from users where user = '$usuario' "; // Selecciona al usuario desde la bd
    $consulname = mysqli_query($conexion,$consul); // conexion + sql
    $datosObtenidos = mysqli_fetch_array($consulname);  // guarda resultado
    $_SESSION['name'] = $datosObtenidos['nombre']; // guardo en la sesion el nombre que obtuve de la bd
    $_SESSION['surname'] = $datosObtenidos['apellido']; // tomo dato
    $_SESSION['username'] = $usuario; //tomo el usuario desde la bd, o sea su identificacion
    $rol = $datosObtenidos['rol'];
    $_SESSION['error'] = !$error; // guardo en la sesion que error es false, o sea , todo bien.
    switch($rol){
        case "docente":
            header("location: home-doc.php"); // redirecciono al home.
        break;
        case "secretario":
            header("location: home-sec.php"); // redirecciono al home.
        break;
        case "sad":
            header("location: home-sad.php"); // redirecciono al home.
    }
    
}else { // si el array esta vacio... 
    $_SESSION['error'] = $error;   //guardo en la sesion la variable de error en true
    header("location: login.php"); // redirijo al login nuevamente.
}



?>