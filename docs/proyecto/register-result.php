<?php
     session_start();
   $rol = $_SESSION['rol'];
  
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../styles/proyecto-styles.css">

        <title>Login - ConcursAR</title>
      

    </head>
    <body>
      
        <header id="header">
            <img src="../../img/escudo.png" class="escudo-header">
            <h2 class="header-brand">
                ConcursAR</h2>
        </header>
        <main>
            <div class="main-without-nav">
                <article id="article">
                    <div class="hero-1">
                        <div class="white-font">
                            <h1 class="custom-h1">Registrado Correctamente!</h1>
                            
                            <?php 
                            switch($rol){
    case "profesor":
        echo "<a  href='home-doc.php' class='p-btn white-font'>Continuar</a>";
         // redirecciono al home.
    break;
    case "maestro":
        echo "<a  href='home-doc.php' class='p-btn white-font'>Continuar</a>";
         // redirecciono al home.
    break;
    case "preceptor":
        echo "<a  href='home-doc.php' class='p-btn white-font'>Continuar</a>";
        // redirecciono al home.
    break;
    case "secretario":
        echo "<a  href='home-sec.php' class='p-btn white-font'>Continuar</a>";
        // redirecciono al home.
    break;
    case "sad":
        echo "<a  href='home-sad.php' class='p-btn white-font'>Continuar</a>";
        // redirecciono al home.
} 
?>
                             
                            
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
            <script src="/edi2/scripts/proyecto-script.js"></script>
        </body>
    </html>