<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devic
    e-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/proyecto-styles.css">
    
    <title>Login - ConcursAR</title>
</head>
<body>
    <?php
     session_start();
     $error = $_SESSION['error'];
    ?>
    <header id="header">
        <img src="../../img/escudo.png" class="escudo-header"> <h2 class="header-brand"> ConcursAR</h2>
        </header>
    <main>
        <div class="main-without-nav">
        <article id="article">
            <div class="hero-2">
                <div class="white-font">
                    <h1 class="custom-h1">Iniciar sesión o Registarte</h1>
                    <div class="log-row">
                        <div class="col-log">
                            <p class="custom-text text-center">¿Ya tenés cuenta?</p>
                            <button class="p-btn white-font modal-login">Iniciar Sesión</button>
                        </div>
                        <div class="col-log">
                            <p class="custom-text text-center">¿Nuevo en la plataforma?</p>
                            <button class="p-btn white-font modal-reg">Registarte</button>
                        </div>

                        <?php
                            if($error){
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
                                <input type="text" name="user" REQUIRED>
                                <label for="pass">Contraseña:</label>
                                <input type="password" name="pass" id="" REQUIRED>
                                <?php
                                if($error){
                                ?>
                                <p style="color:red;"><small>* Datos incorrectos, intente nuevamente</small></p>
                                <?php
                                }
                                ?>
                                <input type="submit" class="login-btn" value="Entrar">  
                            
                            </form>
                        </div>
                        <div class="modal-bg-reg">
                            <form action="./home-doc.html" method="POST" class="modal-b">
                                <div class="reg-camp"><h3>Registrarse</h3> </div>
                                <div class="reg-camp"><label for="login-user">DNI:</label>
                                <input type="number" name="reg-user"></div>
                                <div class="reg-camp"><label for="reg-name">Nombre:</label>
                                <input type="text" name="reg-name">
                                <label for="reg-lastname">Apellido:</label>
                                <input type="text" name="reg-lastname"></div>
                                <div class="reg-camp"><label for="reg-dob">Fecha de nacimiento:</label>
                                <input type="date" name="reg-dob" id="reg-dob"></div>
                                <div class="reg-camp"><label for="reg-rol">Rol en la Plataforma:</label>
                                <select name="reg-rol" id="reg-rol">
                                    <option value="SAD">Administrativo del SAD</option>
                                    <option value="SEC">Secretario de escuela</option>
                                    <option value="POS">Postulante docente</option>    
                                </select>
                                <label for="reg-cargo">Cargo:</label>
                                <select name="reg-sad-cargo" id="reg-sad-cargo">
                                    <option value="null" selected>-</option>
                                    <option value="cargo-sad-adm">Representante SAD</option>
                                </select>
                                <select name="reg-sec-cargo" id="reg-sec-cargo">
                                    <option value="null" selected>-</option>
                                    <option value="cargo-sec-sec">Secretario</option>
                                </select>
                                <select name="reg-pos-cargo" id="reg-pos-cargo">
                                    <option value="null" selected>-</option>
                                    <option value="cargo-pos-preceptor">Preceptor</option>
                                    <option value="cargo-pos-profesor">Profesor</option>
                                    <option value="cargo-pos-maestro">Maestro</option>
                                </select></div>
                                <div class="reg-camp"><label for="reg-pass">Contraseña:</label>
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
        
        <p class="copyright"><h2><small>Mas información</small></h2>  <a href="https://www.argentina.gob.ar/educacion">Ministerio de educación de la Nación</a> |
        <a href="https://www.argentina.gob.ar">Portal de la Nación Argentina</a> | <a href="http://www.abc.gov.ar">Portal de educación de la Prov de Buenos Aires</a></p>
    </footer>
    <script src="./../../../edi2/scripts/proyecto-script.js"></script>
</body>
</html>