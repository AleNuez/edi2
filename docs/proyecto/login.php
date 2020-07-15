<?php
     session_start();  
    
    $error = $_SESSION['error'];
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
            <div class="header-concursar">
                <img src="../../img/escudo.png" class="escudo-header">
                <h2 class="header-brand">
                    ConcursAR</h2>
            </div>
        </header>
        <main>
            <div class="main-without-nav">
                <article id="article">
                    <div class="hero-2">
                        <div class="white-font">
                            <h1 class="custom-h1">Iniciar sesión o Registarte</h1>
                            <div class="log-row">
                                <!-- BOTONES LOGIN REGISTER* -->
                                <div class="col-log">
                                    <p class="custom-text text-center">¿Ya tenés cuenta?</p>
                                    <button class="p-btn white-font modal-login">Iniciar Sesión</button>
                                </div>
                                <div class="col-log">
                                    <p class="custom-text text-center">¿Nuevo en la plataforma?</p>
                                    <button class="p-btn white-font modal-reg">Registarte</button>
                                </div>

                                <?php
                            if($error){              //MENSAJE ERROR LOGIN
                        ?>
                                <!-- <div style="visibility:visible;opacity:1;" class="modal-bg-login"> -->
                                <div class="modal-bg-login bg-active">
                                <?php
                            } else{
                        ?>
                                    <div class="modal-bg-login">
                                        <?php
                            }
                        ?>

                                        <form class="modal-a" method="POST" action="loguear.php">

                                            <span class="modal-close-login">X</span>

                                            <h3>Iniciar Sesión</h3>
                                            <label for="user">Usuario:</label>
                                            <input type="text" name="user" required="REQUIRED">
                                            <label for="pass">Contraseña:</label>
                                            <input type="password" name="pass" id="" required="REQUIRED">
                                            <?php
                                if($error){
                                ?>
                                            <p style="color:red;">
                                                <small>* Datos incorrectos, intente nuevamente</small>
                                            </p>
                                            <?php
                                }
                                ?>
                                            <input type="submit" class="login-btn" value="Entrar">

                                        </form>
                                    </div>
                                    <div class="modal-bg-reg">
                                        <!-- MODAL REGISTRO -->
                                        <form action="./registrar.php" method="POST" class="modal-b">
                                            <div class="reg-camp">
                                                <h3>Registrarse</h3>
                                            </div>
                                            <div class="reg-camp">
                                                <label for="login-user">DNI:</label>
                                                <input type="number" name="reg-user" required="REQUIRED"></div>
                                            <div class="reg-camp">
                                                <label for="reg-name">Nombre:</label>
                                                <input type="text" name="reg-name" required="REQUIRED">
                                                <label for="reg-lastname">Apellido:</label>
                                                <input type="text" name="reg-surname" required="REQUIRED"></div>
                                            <div class="reg-camp">
                                                <label for="reg-dob">Fecha de nacimiento:</label>
                                                <input
                                                    type="date"
                                                    value="<?php echo date('Y-m-d'); ?>"
                                                    name="reg-dob"
                                                    id="reg-dob"
                                                    required="REQUIRED"></div>
                                            <div class="reg-camp">
                                                <label for="reg-rol">Rol en la Plataforma:</label>
                                                <select name="reg-rol" id="reg-rol" required="REQUIRED">
                                                    <option value="NUL" selected="selected">-- Seleccione --</option>
                                                    <optgroup label="Secretaria Asuntos Doc">
                                                        <option value="sad">
                                                            Administrativo del SAD
                                                        </option>
                                                    </optgroup>
                                                    <optgroup label="Secretaría">
                                                        <option value="secretario">Secretario de escuela</option>
                                                    </optgroup>
                                                    <optgroup label="Docente">
                                                        <option value="profesor">Profesor</option>
                                                        <option value="maestro">Maestro</option>
                                                        <option value="preceptor">Preceptor</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="reg-camp">
                                                <label for="reg-pass">Contraseña:</label>
                                                <input type="password" name="reg-pass">
                                                <label for="reg-pass-repeat">Repita Contraseña:</label>
                                                <input type="password" name="reg-pass-repeat"></div>
                                            <input type="submit" class="login-btn" value="Registrarse">
                                            <span class="modal-close-reg">X</span>
                                        </form>
                                    </div>
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
            <script src="/edi2/scripts/proyecto-script.js"></script>
        </body>
    </html>