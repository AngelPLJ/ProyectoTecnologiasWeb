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


// Recibe los datos JSON del cuerpo de la solicitud
$json_data = file_get_contents('php://input');

// Decodifica los datos JSON a un array de PHP
$data = json_decode($json_data, true);

// Accede a los valores individuales
$nombre = $data['nombre'];
$email = $data['email'];
$acerca = $data['acerca'];
$comentario = $data['comentario'];
$sql= "INSERT INTO Contactos (nombre, email, acerca, comentario) VALUES ('$nombre', '$email', '$acerca', '$comentario')";

if ($conexion->query($sql) === TRUE) {
    echo json_encode(['status' => 'success', 'message' => 'Datos recibidos con éxito']);
} else {
    echo json_encode(['status' => 'failed', 'message' => 'Error']);
}

$conexion->close();
?>