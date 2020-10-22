<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>CampeonAPP</title>
    </head>
    <body>
        <div class="main-contenedor">
            <h1>Bienvenido</h1>
            <div class="main-login">
                <div class="main-login-campos">
                    <p>Ingresá</p>
                    <form action="login.php" method="POST">
                        <div class="campo">
                            <label for="main-user-field">Usuario</label>
                            <input
                                class="main-user-field"
                                name="main-user-field"
                                type="text"
                                required="required"></div>
                        <div class="campo">
                            <label for="main-password-field">Clave</label>
                            <input
                                class="main-password-field"
                                name="main-password-field"
                                type="text"
                                required="required"></div>
                        <input type="submit" name="main-entrar" id="main-entrar">
                    </form>
                </div>
                <a href="/edi2/docs/campeonapp/register.php">No tengo un usuario</a>
            </div>
        </div>
    </body>
</html>