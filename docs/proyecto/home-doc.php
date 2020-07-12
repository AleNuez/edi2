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
        <script src="../../scripts/proyecto-script.js"></script>
        <title>Home | ConcursAR</title>
    </head>
    <body>


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
                    <div class="hero-3">

                        <div class="white-font">
                            <h1 class="custom-h1"><?php echo "Hola $convertedName"; ?></h1>
                            <h2 class="custom-text welcome-text">
                                ¿Que desea hacer?
                            </h2>
                            <ul class="home-opt">
                                <li>
                                    <a href="./actos-publicos.html" class="opt-btn white-font">Ver Actos Públicos</a>
                                </li>
                                <li>
                                    <a href="./escuelas.html" class="opt-btn white-font">Ver escuelas</a>
                                </li>
                                <li>
                                    <a href="./mi-postulacion.html" class="opt-btn white-font">Mi postulación</a>
                                </li>
                                <li>
                                    <a href="./calendario.html" class="opt-btn white-font">Próximas fechas</a>
                                </li>
                            </ul>

                        </div>
                    </div>
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
    </body>
</html>