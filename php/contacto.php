<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
// Datos de conexión

$host = 'localhost';
$db   = 'ProyectoWEB';
$user = 'root';
$pass = '';
$charset = 'utf-8';

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

if (isset($_POST['submit'])) {		
    // Accede a los valores individuales
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $acerca = $_POST['acerca'];
    $comentario = $_POST['comentario'];
    $sql= "INSERT INTO Contactos (nombre, email, acerca, comentario) VALUES ('$nombre', '$email', '$acerca', '$comentario')";
	
    if($conexion->query($sql)) {
        $success_message = "Edited Successfully";
    } else {
        $error_message = "Problem in Editing Record";
    }
    header("Location: ../html");

}
$conexion->close();
?>