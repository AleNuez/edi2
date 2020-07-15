<?php
session_start();
$_SESSION['error'] = FALSE;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../styles/proyecto-styles.css">
        <script src="../../scripts/proyecto-script.js"></script>
        <title>ConcursAR</title>
    </head>
    <body>

        <header id="header">
            <div class="header-concursar">
                <img src="../../img/escudo.png" class="escudo-header">
                <h2 class="header-brand">
                    ConcursAR</h2>
            </div>
        </header>
        <main>
            <div class="main-without-nav">
                <article id="article">
                    <div class="hero-3">

                        <div class="white-font">
                            <h1 class="custom-h1">Bienvenido</h1>
                            <p class="custom-text welcome-text">ConcursAR es la plataforma oficial del
                                Ministerio de Educación de la Provincia de Buenos Aires que permite al personal
                                docente postularse a los cargos disponibles en nuestras diferentes instituciones
                                educativas.
                            </p>
                            <div class="main-begin-btn">
                                <a href="./login.php" class="p-btn white-font">Comenzar</a>
                            </div>
                        </div>
                    </div>
                </article>

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
    </body>
</html>