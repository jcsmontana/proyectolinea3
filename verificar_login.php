<?php
// Conexión a la base de datos
$server = "nombre_del_servidor.database.windows.net";
$username = "tu_nombre_de_usuario";
$password = "tu_contraseña";
$database = "nombre_de_la_base_de_datos";
$conn = mysqli_connect($server, $username, $password, $database);

// Verificación de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$email = $_POST["email"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) == 1) {
		session_start();
		$_SESSION["email"] = $email;
		header("Location: inicio.php");
		exit();
	} else {
		echo "Correo electrónico o contraseña incorrectos.";
	}
}

// Cierre de la conexión a la base de datos
mysqli_close($conn);
?>
