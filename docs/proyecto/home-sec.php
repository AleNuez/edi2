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
        <link rel="stylesheet" href="../../styles/proyecto-styles.css">

        <title>Home | ConcursAR</title>
    </head>
    <body>
      
        <header id="header">
            <div class="header-escudo">
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
                    <div class="hero-6">

                        <div class="white-font">
                            <h1 class="custom-h1"><?php echo "Hola $convertedName"; ?></h1>
                            <h2 class="custom-text welcome-text">
                                ¿Que desea hacer?
                            </h2>
                            <ul class="home-opt">
                                <li>
                                    <button id="sec-upload-btn" class="opt-btn white-font">Subir cargos disponibles</button>
                                </li>
                                <li>
                                    <a href="./sec-mi-escuela.html" class="opt-btn white-font">Mi Escuela</a>
                                </li>
                                <li>
                                    <a href="./sec-calendario.html" class="opt-btn white-font">Próximas fechas</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sec-upload-modal">
                        <form
                            class="sec-upload-modal-style"
                            method="POST"
                            action="./sec-mi-escuela.html">

                            <span class="sec-upload-close">X</span>
                            <h3>Subir nuevo cargo disponible</h3>
                            <div class="reg-camp">
                                <label for="s-cargo">Cargo:</label>
                                <select name="s-cargo" id="s-cargo">
                                    <option value="">
                                        - Seleccione</option>
                                    <option value="PR">PR - Preceptor</option>
                                    <option value="PRF">PRF - Profesor</option>
                                    <option value="M">M - Maestro</option>
                                </select>
                            </div>
                            <div class="reg-camp">
                                <label for="s-region">Región:</label>
                                <select name="s-region" id="s-region">
                                    <option value="">
                                        - Seleccione</option>
                                    <option value="PR">8</option>
                                    <option value="PRF">7</option>
                                    <option value="M">2</option>
                                </select>
                            </div>
                            <div class="reg-camp">
                                <label for="s-distrito">Distrito:</label>
                                <select name="s-distrito" id="s-distrito">
                                    <option value="">
                                        - Seleccione</option>
                                    <option value="PR">Merlo</option>
                                    <option value="PRF">Ituzaingó</option>
                                    <option value="M">Hurlingham</option>
                                </select>
                            </div>
                            <div class="reg-camp">
                                <label for="s-escuela">Escuela:</label>
                                <select name="s-escuela" id="s-escuela">
                                    <option value="">
                                        - Seleccione</option>
                                    <option value="PR">EES N°45</option>
                                    <option value="PRF">EEP N°7</option>
                                    <option value="M">ET N°1</option>
                                </select>
                            </div>
                            <input type="submit" class="login-btn" value="Subir">

                            <a href="./home-sec.html" class="close-btn">Cancelar</a>
                        </form>
                    </div>
                    <!-- termina modal profile -->

                </article>

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
        <script src="../../scripts/sec-home.js"></script>
    </body>
</html>