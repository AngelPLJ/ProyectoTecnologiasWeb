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

$sql= "SELECT * FROM Noticias ORDER BY tituloNot LIMIT 3";
$stmt=$conexion->prepare($sql);
$stmt->execute();
$dato=$stmt->get_result();

// Almacenar los resultados en un array
$resultados = array();

while($row = $dato->fetch_assoc()) {
    if($row != NULL) {
        $resultados[] = $row;
    }
}

// Devuelve los datos en formato JSON al final del bucle
header("Content-Type: application/json");
echo json_encode($resultados);

// Cerrar la conexión
$stmt->close();
$conexion->close();
?>