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
                <a href="./home-sad.php" class="header-link"><img src="../../img/escudo.png" class="escudo-header">
                    <h2 class="header-brand">
                        ConcursAR</h2>
                </a>
            </div>
            <div class="user-part">
                <a href="./profile-sad.php" class="header-link">
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
                    <div class="hero-1">

                        <div class="white-font">

                            <h1 class="custom-h1"><?php echo "Hola $convertedName"; ?></h1>
                            <h2 class="custom-text welcome-text">
                                ¿Que desea hacer?
                            </h2>
                            <ul class="home-opt">
                                <li>
                                    <button id="sad-upap-btn" class="opt-btn white-font">Subir acto público</button>
                                </li>
                                <li>
                                    <button id="sad-upesc-btn" class="opt-btn white-font">Subir escuelas</button>
                                </li>
                                <li>
                                    <a href="./sad-postulaciones.html" class="opt-btn white-font">Administrar postulaciones</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </article>

                <div class="sad-upap-modal">
                    <form class="sad-upap-modal-style" method="POST" action="./actos-publicos.html">

                        <span class="sad-upap-close">X</span>
                        <h3>Subir nuevo acto público disponible</h3>
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

                        <a href="./home-sad.html" class="close-btn">Cancelar</a>
                    </form>
                </div>
                <!-- termina modal profile -->

                <div class="sad-upesc-modal">
                    <form class="sad-upesc-modal-style" method="POST" action="./escuelas.html">

                        <span class="sad-upesc-close">X</span>
                        <h3>Subir nueva escuela</h3>
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

                        <a href="./home-sad.html" class="close-btn">Cancelar</a>
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
        <script src="../../scripts/sad-home.js"></script>
    </body>
</html>