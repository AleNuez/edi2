<?php

require 'conexion.php';
session_start();

$globaluser = $_SESSION['username'];
$globalpassword = $_SESSION['globalpassword'];

$usuario = $_POST['edit-user']; //usuario y clave enviado por usuario en el form
$nombre = $_POST['edit-nombre'];
$apellido = $_POST['edit-apellido'];
$dob = $_POST['edit-dob'];
$cargo = $_POST['edit-rol'];
$area = $_POST['edit-area'];
$especialidad = $_POST['edit-especialidad'];
$provincia = $_POST['edit-provincia'];
$region = $_POST['edit-region'];
$distrito = $_POST['edit-distrito'];
$documentacion = $_POST['edit-documentacion'];
$puntaje = $_POST['edit-puntaje'];
$password = $_POST['edit-pass'];
$password_repeat = $_POST['edit-pass-repeat'];

$error = TRUE; // Estatus de error para enviar mensaje bajo el formulario


$salirabuscar = "SELECT COUNT(*) as filas from users where user ='$globaluser' and password = '$globalpassword' "; // Selecciona la fila que coincida con usuario y contraseña
$consulta = mysqli_query($conexion,$salirabuscar); // une los datos de conexion + la consulta SQL
$resultado = mysqli_fetch_array($consulta); // guarda en una variable el resultado de la consulta

if($resultado['filas']>0){  // Si hay un resultado en el array...

    $action = "UPDATE users SET user='$usuario',password='$password',nombre='$nombre',apellido='$apellido',rol='$cargo',dob='$dob',puntaje='$puntaje',documentacion='$documentacion',provincia='$provincia',region='$region',distrito='$distrito',area='$area',especialidad='$especialidad' WHERE user = '$globaluser'" ; // 
    $consultaedit = mysqli_query($conexion,$action); // une los datos de conexion + la consulta SQL
   

    $_SESSION['error'] = !$error; // guardo en la sesion que error es false, o sea , todo bien.
   
    if($consultaedit){

        $_SESSION['name'] = $nombre;
        $_SESSION['surname'] = $apellido;
        switch($cargo) {
            case 'profesor':
                header('location: ./profile-doc.php');
            break;
            case 'maestro':
                header('location: ./profile-doc.php');
            break;
            case 'preceptor':
                header('location: ./profile-doc.php');
            break;
            case 'secretario':
                header('location: ./profile-sec.php');
            break;
            case 'sad':
                header('location: ./profile-sad.php');
            break;
        }
        
     
     
     
     } else {
     
     header('login.php');
     }
    
}else { // si no existe usuario, en este caso debería porque ya está logueado...
    echo "No existe, rarisimo.";
   
}

?>