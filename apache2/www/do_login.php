<?php
    #DEV TOOLS. ¡COMENTAR LÍNEA  3 ANTES DE HACER COMMIT!
    #ini_set('display_errors', 'On');

    try{
        #Se requiere el archivo que contiene los datos para la conexión a la BBDD

        #Conexión a la BBDD
        $conn = new mysqli('172.16.0.2', 'root', '1234', 'mysitedb');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        #Se guardan los datos obtenidos en el login en variables locales
        $email = $_POST['email'];
        $password = $_POST['password'];


        #Se comprueba que exista un usuario con el email introducido en la BBDD 
        $stmt = $conn->prepare("SELECT email, encrypted_password, id FROM tUser WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $fila = $result->fetch_array();
        $encrypted_password_string = $fila[1];
        $id_string= $fila[2];

        #Si NO existe un usuario con ese mail, se le informa de ello. Si existe se continúa comprobando
        if (($result->num_rows) == 0) {
            header("Location: login.php?login_failed_email=True");
            exit;
        } else {
            #Se comprueba que la contraseña sea correcta
            if (password_verify($password, $encrypted_password_string)) {
                session_start();
                $_SESSION['user_id'] = $id_string;
                header("Location: main.php");
                exit;
            } else {
                header("Location: login.php?login_failed_password=True");
                exit;
            }
        }
        $stmt->close();
    }catch (Throwable $e){
        //Se devolverá este header si se produce cualquier error no esperado
        header("Location: login.php?login_failed_unknown=True");
        exit;
    }
?>
