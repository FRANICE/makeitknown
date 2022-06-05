<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Login</title>
</head>
<body>
    <div class="contenedor-logo">
        <h2>make<span>it</span>known</h2>
    </div>
    <div class="wrapper">
        <div class="title-text">
            <div class="title">
                Iniciar Sesión
            </div>
        </div>
        <div class="form-container">
            <div class="form-inner">
                <form action="do_login.php" method="post" class="login">
                    <div class="field">
                        <input type="email" name="email" type="text" placeholder="Correo electrónico" required>
                    </div>
                    <div class="field">
                        <input type="password" name="password" type="text" placeholder="Contraseña" required>
                    </div>
                    <div class="pass-link">
                        <a href="#">¿Olvidaste tu contraseña?</a>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Iniciar sesión"/>
                    </div>
                    <div class="signup-link">
                        ¿No tienes cuenta? <a href="register.php">Regístrate</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        //Error que se devuelve cuando no hay ningún usuario con el mail introducido.
        if (isset($_GET['login_failed_email']) == 'True') {
            echo "<script>alert('No existe ningún usuario registrado con ese email.')</script>";
        }

        //Error que se devuelve cuando la contraseña no es correcta.
        if (isset($_GET['login_failed_password']) == 'True') {
            echo "<script>alert('La contraseña no es correcta.')</script>";
        }

        //Error que se devuelve cuando se desconoce qué ha causado el error.
        if (isset($_GET['login_failed_unknown']) == 'True') {
            echo "<script>alert('Error desconozido. Inténtalo de nuevo más tarde.')</script>";
        }
    ?>
</body>
</html>