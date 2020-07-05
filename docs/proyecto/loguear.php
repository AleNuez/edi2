<?php

require 'conexion.php';
session_start();

$usuario = $_POST['user'];
$clave = $_POST['pass'];
$error = TRUE;


$q = "SELECT COUNT(*) as contar from users where user ='$usuario' and password = '$clave' ";
$consulta = mysqli_query($conexion,$q);
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
    $consul = "SELECT * from users where user = '$usuario' ";
    $consulname = mysqli_query($conexion,$consul);
    $marray = mysqli_fetch_array($consulname);
    $_SESSION['name'] = $marray['nombre'];
    $_SESSION['surname'] = $marray['apellido'];
    $_SESSION['username'] = $usuario;
    $_SESSION['error'] = !$error;
    header("location: home-doc.php");
}else {
    $_SESSION['error'] = $error;
    header("location: login.php");
}



?>