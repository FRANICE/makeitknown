<?php
//ini_set('display_errors', 'On');
$conn = new mysqli('172.16.0.2', 'root', '1234', 'mysitedb');
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

$username = $_POST['username'];

//Se alamacenan dos variables email para que se compruebe este campo y evitar errores por parte del ususario.
$email = $_POST['email'];
$email_confirmation = $_POST['email_confirmation'];

//Sucede los mismo que con el campo email
$password = $_POST['password'];
$password_confirmation = $_POST['password_confirmation'];

//Se comprueba que todos los campos del formulario se han rellenado
if (empty($username) or empty($email) or empty($email_confirmation) or empty($password) or empty($password_confirmation)) {
	die("<script>alert('Falta por rellenar algún campo del formulario.')</script>");
}

//Se realiza la comprobación del email
if ($email != $email_confirmation){
	die("<script>alert('El campo email no coincide.')</script>");
}

//Se realiza la comprobación de la contraseña
if($password != $password_confirmation) {
	die("<script>alert('El campo contraseña no coincide.')</script>");
}

//Realizamos un prepare statement con la sentencia SQL necesaria, en este caso un INSERT a la BD
//Este será dispuesto dentro de un "try-catch" por si aparecen errores en la ejecución

try{
	$sql = "INSERT INTO tUser (username, email, encrypted_password) VALUES (?, ?, ?)";
	$stmt = $conn -> prepare($sql);

	//La contraseña será encryptada y posteriormente hasheada
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

	$stmt -> bind_param("sss", $username, $email, $password);
	$stmt -> execute();


	if (!empty($conn -> error)){
		echo($conn -> error);
		header("Location: register.php?register_failed_email=True");
		exit();
	}


	$stmt -> close();
} catch(Exception $e) { //Si algo ha ido mal, saltará este error, el cual manda un header diferente a los demas errores
	error_log($e);
	header("Location: register.php?register_failed_unknown=True");
	exit();
}
//Si todo ha ido correctamente, "success" será True, esta información será enviada a traves de la url, y se recibirá en register.php, lo que pintará un mensage en pantalla.
header("Location: register.php?success=True");
