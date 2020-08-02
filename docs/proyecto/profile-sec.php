<?php
include("conexion.php");
session_start();
$usuario = $_SESSION['username'];
$name = $_SESSION['name'];
$convertedName = ucfirst($name);
$surname = $_SESSION['surname'];
$convertedSurname = ucfirst($surname);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="/edi2/styles/proyecto-styles.css">

        <title>Mi Perfil | ConcursAR</title>
    </head>
    <body>

<header id="header">

            <div class="header-concursar">
                <a href="./home-sec.php" class="header-link"><img src="../../img/escudo.png" class="escudo-header">
                    <h2 class="header-brand">
                        ConcursAR</h2>
                </a>
            </div>
            <div class="user-part">
                <a href="./profile-sec.php" class="header-link">
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
                    <div class="hero hero-5 profile-padding">

                        <div class="white-font flex-parent">
                            <div class="col-1">
                                <h1 class="custom-h1 profile-title">Perfil Secretario</h1>
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
                                   
                                    type="submit"
                                    class="login-btn"
                                    value="Cargar">
                                <!-- <a class="close-btn" href="./profile-sec.php">Cancelar</a> -->
                            </div>
                        </form>
                    </div>
                    <!-- termina modal profile -->

                    <!-- empieza modal view profile -->

                    <div class="profile-view-modal">
                        <form
                            class="profile-view-modal-style view-profile-spec"
                            method="POST"
                            action="./profile-sec.html">

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
                                            class="user-profile smaller-profile">
                                    <?php
            }else {
            ?>
                                        <img src="../../img/default-user.jpg" class="user-profile smaller-profile">
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
                                    $show_password = $datosObtenidos['password'];
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
                                        <!--Nombre - DNI - Cargo - Fecha Nac - rol - Puntaje - Documentacion -->
                                        <!-- Provincia - Distrito - la otra division - - curso turno -->
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

                                <a href="./profile-sec.php" class="close-btn">Cerrar</a>
                            </form>
                        </div>

                        <!-- termina modal profile view -->
                        <div class="profile-edit-modal">
                            <!-- FORM EDIT -->
                            <form action="./edit.php" method="POST" class="profile-edit-modal-style">
                            <div class="all-forms">
                                <div class="reg-camp">
                                    <h3>Actualizar Datos</h3>
                                </div>
                                <div class="reg-camp">
                                    <!-- <label for="login-user">DNI:</label>
                                    <input
                                        value="<?php echo "$show_dni"; ?>"
                                        type="number"
                                        name="edit-user"
                                        required="REQUIRED"> -->
                                    <label for="reg-dob">Fecha de nacimiento:</label>
                                    <input
                                        type="date"
                                        value="<?php echo "$show_dob"; ?>"
                                        name="edit-dob"
                                        id="reg-dob"
                                        required="REQUIRED">
                                </div>
                                <div class="reg-camp">
                                    <label for="reg-name">Nombre:</label>
                                    <input
                                        value="<?php echo "$show_nombre"; ?>"
                                        type="text"
                                        name="edit-nombre"
                                        required="REQUIRED">
                                    <label for="reg-lastname">Apellido:</label>
                                    <input
                                        value="<?php echo "$show_apellido"; ?>"
                                        type="text"
                                        name="edit-apellido"
                                        required="REQUIRED"></div>
                                <div class="reg-camp">
                                   <!--  <label for="reg-rol">Rol en la Plataforma:</label>
                                    <select name="edit-rol" id="reg-rol" required="REQUIRED">
                                        <option value="NUL">-- Seleccione --</option>
                                        <optgroup label="Secretaria Asuntos Doc">
                                            <option value="sad" 
                                            <?php if($show_cargo=="Sad"){echo "selected";} ?>
                                            >
                                                Administrativo del SAD
                                            </option>
                                        </optgroup>
                                        <optgroup label="Secretaría">
                                            <option
                                                value="secretario"
                                                <?php if($show_cargo=="Secretario"){echo "selected";} ?>>Secretario de escuela</option>
                                        </optgroup>
                                        <optgroup label="Docente">
                                            <option value="profesor" <?php if($show_cargo=="Profesor"){echo "selected";} ?>>Profesor</option>
                                            <option value="maestro" <?php if($show_cargo=="Maestro"){echo "selected";} ?>>Maestro</option>
                                            <option
                                                value="preceptor"
                                                <?php if($show_cargo=="Preceptor"){echo "selected";} ?>>Preceptor</option>
                                        </optgroup>
                                    </select> -->
                                    <label for="reg-area">Area:</label>
                                    <input value="<?php echo "$show_area"; ?>" type="text" name="edit-area">
                                    <label for="reg-especialidad">Especialidad:</label>
                                    <input
                                        value="<?php echo "$show_especialidad"; ?>"
                                        type="text"
                                        name="edit-especialidad">
                                </div>
                                <div class="reg-camp">
                                    <label for="reg-provincia">Provincia:</label>
                                    <input
                                        value="<?php echo "$show_provincia"; ?>"
                                        type="text"
                                        name="edit-provincia"
                                        required="REQUIRED">
                                    <label for="reg-region">Región:</label>
                                    <input
                                        value="<?php echo "$show_region"; ?>"
                                        type="text"
                                        name="edit-region"
                                        required="REQUIRED">
                                    <label for="reg-distrito">Distrito:</label>
                                    <input
                                        value="<?php echo "$show_distrito"; ?>"
                                        type="text"
                                        name="edit-distrito"
                                        required="REQUIRED">
                                </div>
                                <div class="reg-camp">
                                    <label for="reg-documentacion">Documentación:</label>
                                    <input
                                        value="<?php echo "$show_documentacion"; ?>"
                                        type="file"
                                        name="edit-documentacion">
                                    <label for="reg-puntaje">Puntaje:</label>
                                    <input class="puntaje-camp" value="<?php echo "$show_puntaje"; ?>" type="text" name="edit-puntaje">
                                </div>
                                <div class="reg-camp">
                                    <label for="reg-pass">Contraseña:</label>
                                    <div class="passandimg"><input
                                        required
                                        id="hidden-password"
                                       class="pass-camp"
                                        type="password"
                                        name="edit-pass">
                                    <img onmousedown="showpass()" onmouseup="hidepass()" class="view-password"></img>
                                    </div>
                                    <label for="reg-pass-repeat">
                                        Confirme Contraseña:</label>
                                    <input
                                        
                                        type="password"
                                        name="edit-pass-repeat"></div>
                                <input type="submit" class="login-btn" value="Actualizar">
                                <span class="profile-edit-close">X</span>
                            </div> <!-- termina all reg -->
                            </form>
                        </div>
                        <!-- termina modal profile -->
                    </div>
                </main>
                <footer id="footer">

<h2 class="footer-more-info">
    <small>Mas información</small>
</h2>
<div class="footer-links">
    <a class="footer-a-tags" href="https://www.argentina.gob.ar/educacion">| Ministerio de educación de la Nación |</a>

    <a class="footer-a-tags" href="https://www.argentina.gob.ar">| Portal de la Nación Argentina |</a>

    <a class="footer-a-tags" href="http://www.abc.gov.ar">| Portal de educación de la Prov de Buenos Aires |</a>
</div>

</footer>
                <script src="../../scripts/profile-script.js"></script>
                <script>
                    function showpass() {
                        document
                            .querySelector('#hidden-password')
                            .type = "text";
                    }
                    function hidepass() {
                        document
                            .querySelector('#hidden-password')
                            .type = "password";
                    }
                </script>
            </body>
        </html>