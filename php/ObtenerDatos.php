<?php
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


$sql= "SELECT * FROM Noticias";
$stmt=$conexion->prepare($sql);
$stmt->execute();
$dato=$stmt->get_result();
// Devuelve los datos en formato JSON
header("Content-Type: application/json");
while($row = $dato->fetch_assoc()) {
    if($row != NULL) {
        echo json_encode($row);
    }
}
?>