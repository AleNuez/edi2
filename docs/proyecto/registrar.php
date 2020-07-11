<?php

require("conexion.php");
session_start();

// user-password-nombre-apellido-rol-dob
$dni = $_POST['reg-user'] ;
$nombre = $_POST['reg-name'];
$apellido = $_POST['reg-surname'];
$dob = date('Y-m-d', strtotime($_POST['reg-dob']));
$rol = $_POST['reg-rol'];
$contra = $_POST['reg-pass'];
$recontra = $_POST['reg-pass-repeat'];

$action = "INSERT INTO users(user,nombre,apellido,dob,rol,password) VALUES ('$dni','$nombre','$apellido','$dob','$rol','$contra')"; // 
$consultaRegister = mysqli_query($conexion,$action); // une los datos de conexion + la consulta SQL
//$resultadoObtenido = mysqli_fetch_array($consultaRegister);
// Datos de nueva sesión: 
$_SESSION['name'] = $nombre;
$_SESSION['rol'] = $rol;
$_SESSION['surname'] = $apellido;
$_SESSION['username'] = $dni;
$_SESSION['globalpassword'] = $contra;
$_SESSION['username'] = $dni; //tomo el usuario desde la bd, o sea su identificacion


if($consultaRegister){

   header('location: ./register-result.php');



} else {

header('login.php');
}

?>