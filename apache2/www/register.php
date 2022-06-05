<!DOCTYPE html>
<html lang="es-ES" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor-logo">
        <h2>make<span>it</span>known</h2>
    </div>
    <div class="wrapper">
        <div class="title-text">
            <div class="title">
                Registro
            </div>
        </div>
        <div class="form-container">
            <div class="form-inner">
                <form action="do_register.php" method="post" class="login">
                    <div class="field">
                        <input name="username" id="username" type="text" placeholder="Nombre de usuario" required/>
                    </div>
                    <div class="field">
                        <input name="email" id="email" type="text" placeholder="Email" required/>
                    </div>
                    <div class="field">
                        <input name="email_confirmation" id="email_confirmation" type="text" placeholder="Confirmar email" onpaste="return false;" ondrop="return false;" autocomplete="off" required/>
                    </div>
                    <div class="field">
                        <input name="password" id="password" type="password" placeholder="Contraseña" onpaste="return false;" ondrop="return false;" autocomplete="off" required/>
                    </div>
                    <div class="field">
                        <input name="password_confirmation" id="password_confirmation" type="password" placeholder="Confirmar contraseña" onpaste="return false;" ondrop="return false;" autocomplete="off" required/>
                    </div>
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" value="Registrarse"/>
                    </div>
                    <div class="signup-link">
                        ¿Ya tienes cuenta? <a href="login.php">Iniciar sesión</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        //Mensaje de éxito cuando el usuario ha sido creado correctamente.
        if(isset($_GET['success'])) {
            //Este mensaje se mostrará si todo ha ido correctamente, es decir, success=True en el header.
            if($_GET['success'] == TRUE) {
                echo "<script>alert('Usuario creado correctamente. Inicia sesión clicando en el enlace de abajo.')</script>";
            }
        }
        if(isset($_GET['register_failed_email'])) {
            if($_GET['register_failed_email'] == TRUE){//Si se da el caso de que ya exista un usuario con el email introducido, se mostrará este menjage por pantalla
                echo "<script>alert('Ya existe un usuario con el email indicado.')</script>";
            }
        }
        //
        if(isset($_GET['register_failed_unknown'])) {
            if($_GET['register_failed_unknown'] == TRUE) {//Si sucedió un error desconocido se mostrará este mensage por pantalla
                echo "<script>alert('Error desconozido. Inténtalo de nuevo más tarde.')</script>";
                }
        }
    ?>
</body>
</html>