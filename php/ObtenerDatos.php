<?php
// Simula la obtenciÃ³n de datos desde una fuente externa, por ejemplo, una base de datos
$datos = array(
    "nombre" => "Ejemplo",
    "edad" => 25,
    "ciudad" => "Ciudad Ejemplo"
);

// Devuelve los datos en formato JSON
header("Content-Type: application/json");
echo json_encode($datos);
?>