<?php
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Registro | CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <h1>Sumate al equipo</h1>
            <div class="main-login">
                <div class="main-login-campos">
                    <p>Registrate</p>
                    <form action="registrar.php" method="POST">
                        <div class="campo">
                            <label for="reg-user-field">Usuario</label><br>
                            <input class="user-field" name="reg-user-field" type="text" required="required"></div>
                        <div class="campo">
                            <label for="reg-password-field">Clave</label><br>
                            <input
                                class="password-field"
                                name="reg-password-field"
                                type="password"
                                required="required"></div>
                        <div class="campo">
                            <label for="repeat-password-field">Repita Clave</label><br>
                            <input
                                class="password-field"
                                name="repeat-password-repeat-field"
                                type="password"
                                required="required"></div>
                        <div class="campo">
                            <label for="">Rol</label><br>
                            <input
                                type="radio"
                                id="par"
                                name="rol-field"
                                value="Participante"
                                required="required">
                            <label for="par">Participante</label><br>
                            <input type="radio" id="org" name="rol-field" value="Organizador">
                            <label for="org">Organizador</label>
                        </div>
                        <input type="submit" name="rol-entrar" id="main-entrar">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>