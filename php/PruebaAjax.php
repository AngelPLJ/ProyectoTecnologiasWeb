<?php
// Recibe los datos JSON del cuerpo de la solicitud
$json_data = file_get_contents('php://input');

// Decodifica los datos JSON a un array de PHP
$data = json_decode($json_data, true);

// Accede a los valores individuales
$campo1 = $data['campo1'];
$campo2 = $data['campo2'];

// Haz lo que necesites con los datos, por ejemplo, guardar en la base de datos, etc.

// Responde con algún mensaje, por ejemplo, un mensaje de éxito
echo json_encode(['status' => 'success', 'message' => 'Datos recibidos con éxito']);
?>
