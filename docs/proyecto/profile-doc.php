<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/edi2/styles/proyecto-styles.css">

        <title>Mi Perfil | ConcursAR</title>
    </head>
    <body>

        <?php
include("conexion.php");
session_start();
$usuario = $_SESSION['username'];
$name = $_SESSION['name'];
$convertedName = ucfirst($name);
$surname = $_SESSION['surname'];
$convertedSurname = ucfirst($surname);
?>

        <header id="header">
            <div class="header-escudo">
                <a href="./home-doc.php" class="header-link"><img src="../../img/escudo.png" class="escudo-header">
                    <h2 class="header-brand">
                        ConcursAR</h2>
                </a>
            </div>
            <div class="user-part">
                <a href="./profile-doc.php" class="header-link">
                    <?php
                $buscarImgs = "SELECT image FROM users WHERE user='$usuario' ";
                $isthereImgs = $conexion->query($buscarImgs);
                $colocar = $isthereImgs->fetch_assoc();
            if($colocar['image']){
            ?>
                    <img
                        src="data:image/jpg;base64,<?php echo base64_encode($colocar['image']); ?>"
                        class="user-header">
                <?php
            }else {
            ?>
                    <img src="../../img/default-user.jpg" class="user-header">
                    <?php
            }
            ?>

                    <p class="header-brand"><?php echo "{$convertedName} {$convertedSurname}"; ?></p>
                </a>
            </div>
        </header>
        <main>

            <div class="main-without-nav">
                <article id="article">
                    <div class="hero-4 ">

                        <div class="white-font flex-parent">
                            <div class="col-1">
                                <h1 class="custom-h1">Perfil Docente</h1>
                                <div class="profile-photo">
                                    <?php
                $buscarImgs = "SELECT image FROM users WHERE user='$usuario' ";
                $isthereImgs = $conexion->query($buscarImgs);
                $colocar = $isthereImgs->fetch_assoc();
            if($colocar['image']){
            ?>
                                    <img
                                        src="data:image/jpg;base64,<?php echo base64_encode($colocar['image']); ?>"
                                        class="user-profile">
                                <?php
            }else {
            ?>
                                    <img src="../../img/default-user.jpg" class="user-profile">
                                    <?php
            }
            ?>
                                    <button id="profile-pic-btn" class="prof-btn white-font">Cambiar foto de perfil</button>
                                </div>
                            </div>
                            <div class="col-2">
                                <h2 class="custom-text welcome-text">
                                    ¿Que desea hacer?
                                </h2>
                                <ul class="prof-opt">
                                    <li>
                                        <button id="profile-view-btn" class="opt-profile-btn white-font">Ver mi información</button>
                                    </li>
                                    <li>
                                        <button id="profile-edit-btn" class="opt-profile-btn white-font">Actualizar mis datos</button>
                                    </li>
                                    <li>
                                        <a href="proyecto.php" class="cancel-profile-btn white-font">Cerrar Sesión</a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>

                </article>

                <div class="tabla">
                    <div class="profile-pic-modal">
                        <form
                            class="profile-pic-modal-style"
                            enctype="multipart/form-data"
                            method="POST"
                            action="./save-pic.php">

                            <span class="profile-pic-close">X</span>

                            <h4>Subir foto</h4>

                            <input
                                style="display:flex;"
                                required="REQUIRED"
                                class="file-loader"
                                type="file"
                                name="Imagen">
                            <label for="">
                                <small>* La imagen no debe pesar más de 2MB</small>
                            </label>

                            <div style="justify-content:space-between; display:flex;" class="botonera">
                                <input
                                    style="padding:0rem 3rem;margin:0.3rem 0.3rem;"
                                    type="submit"
                                    class="login-btn"
                                    value="Cargar">
                                <a class="close-btn" href="./profile-doc.php">Cancelar</a>
                            </div>
                        </form>
                    </div>
                    <!-- termina modal profile -->

                    <div class="profile-view-modal">
                        <form
                            class="profile-view-modal-style"
                            method="POST"
                            action="./profile-doc.html">

                            <span class="profile-view-close">X</span>
                            <div class="flex-parent">
                                <div class="col-a-profile">
                                    <div class="profile-photo">
                                    <?php
                $buscarImgs = "SELECT image FROM users WHERE user='$usuario' ";
                $isthereImgs = $conexion->query($buscarImgs);
                $colocar = $isthereImgs->fetch_assoc();
            if($colocar['image']){
            ?>
                                    <img
                                        src="data:image/jpg;base64,<?php echo base64_encode($colocar['image']); ?>"
                                        class="user-profile">
                                <?php
            }else {
            ?>
                                    <img src="../../img/default-user.jpg" class="user-profile">
                                    <?php
            }
            ?>
                                        

                                    </div>
                                </div>
                                <div class="col-b-profile">
                                    <h3 class="muestra-heading">Mi perfil</h3>
                                    <?php
                                    $getProfileData = "SELECT * FROM users WHERE user='$usuario' ";
                                    $hayData = $conexion->query($getProfileData);
                                    $datosObtenidos = mysqli_fetch_array($hayData);
                                    $show_nombre = ucfirst($datosObtenidos['nombre']);
                                    $show_apellido = ucfirst($datosObtenidos['apellido']);
                                    $show_dni = $datosObtenidos['user'];
                                    $show_dob = $datosObtenidos['dob'];
                                    $show_cargo = ucfirst($datosObtenidos['rol']);
                                    $show_area = ucfirst($datosObtenidos['area']);
                                    $show_especialidad = ucfirst($datosObtenidos['especialidad']);
                                    $show_puntaje = $datosObtenidos['puntaje'];
                                    $show_docuementacion = $datosObtenidos['documentacion'];
                                    $show_provincia = ucfirst($datosObtenidos['provincia']);
                                    $show_region = ucfirst($datosObtenidos['region']);
                                    $show_distrito = ucfirst($datosObtenidos['distrito']);
                                    $show_hasdocu = "NO";

                                    ?>
                                    <div class="muestra"> 
                                    <!--Nombre - DNI - Cargo - Fecha Nac - rol - Puntaje - Documentacion   -->
                                    <!-- Provincia - Distrito - la otra division -  - curso turno -->
                                        <span>Nombre:</span><span><?php echo " {$show_nombre} {$show_apellido}"; ?><br>
                                        <span>Cargo:</span><span><?php echo " {$show_cargo}"; ?></span><br>
                                        <span>Area:</span><span><?php echo " {$show_area}"; ?></span><br>
                                        <span>Especialidad:</span><span><?php echo " {$show_especialidad}"; ?></span><br>
                                        <span>DNI:</span><span><?php echo " {$show_dni}"; ?></span><br>
                                        <span>Puntaje:</span><span><?php echo " {$show_puntaje}"; ?></span><br>
                                        <span>Documentacion:</span><span><?php echo " {$show_hasdocu}"; ?></span><br>
                                        <span>Provincia:</span><span><?php echo " {$show_provincia}"; ?></span><br>
                                        <span>Región:</span><span><?php echo " {$show_region}"; ?></span><br>
                                        <span>Distrito:</span><span><?php echo " {$show_distrito}"; ?></span><br>
                                        
                                    </div>
                                </div>
                            </div>

                            <a href="./profile-doc.php" class="close-btn">Cerrar</a>
                        </form>
                    </div>
                    <!-- termina modal profile -->
                    <div class="profile-edit-modal">
                        <form
                            class="profile-edit-modal-style"
                            method="POST"
                            action="./profile-doc.html">

                            <span class="profile-edit-close">X</span>
                            <div class="flex-parent">
                                <div class="col-1">
                                    <div class="profile-photo"><img src="../../img/default-user.jpg" class="user-profile">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <h3>Mi perfil</h3>
                                    <div class="muestra">
                                        <span>Nombre:</span>
                                        <span>
                                            132</span><br>
                                        <span>
                                            Apellido
                                        </span><span>Titularización</span><br>
                                        <span>
                                            Cargo
                                        </span><span>PR</span>
                                        <br>
                                        <span>
                                            DNI</span><span>10/04/2020</span><br>
                                        <span>
                                            Hasta
                                        </span><span>09/11/2020</span>
                                        <br>
                                        <span>
                                            Escuela
                                        </span><span>EES N°45</span>
                                        <br>
                                        <span>
                                            Turno
                                        </span><span>Mañana</span>
                                        <br>
                                        <span>
                                            Dias
                                        </span><span>-</span><br>
                                        <span>
                                            Curso
                                        </span><span>4to C</span><br>
                                        <span>
                                            Hs
                                        </span><span>-</span>
                                        <br>
                                    </div>
                                </div>
                            </div>

                            <button class="close-btn">Cerrar</button>
                        </form>
                    </div>
                    <!-- termina modal profile -->
                </div>
            </main>
            <footer id="footer">

                <p class="copyright">
                    <h2>
                        <small>Mas información</small>
                    </h2>
                    <a href="https://www.argentina.gob.ar/educacion">Ministerio de educación de la Nación</a>
                    |
                    <a href="https://www.argentina.gob.ar">Portal de la Nación Argentina</a>
                    |
                    <a href="http://www.abc.gov.ar">Portal de educación de la Prov de Buenos Aires</a>
                </p>
            </footer>
            <script src="../../scripts/profile-script.js"></script>
        </body>
    </html>