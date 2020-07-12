<?php

function resize_image($file, $w, $h, $crop=FALSE) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($file);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

include('conexion.php');
session_start();
$user = $_SESSION['username'];
$imagen = $_FILES['Imagen']['tmp_name'];


$Img = addslashes(file_get_contents($imagen)); //tmp_name: nombre del arhivo en el SO
//$Img = resize_image($imagen, 200, 200);
$saveImg = "UPDATE users SET image='$Img' WHERE user = '$user'";

$resultadosave = $conexion->query($saveImg);

if($resultadosave){
   
    header("location: ./profile-doc.php");
} else {
   
    header("location: ./profile-doc.php");
    
}

?>