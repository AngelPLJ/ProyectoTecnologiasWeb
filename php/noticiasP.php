<?php
echo("hola");

// Datos de conexión (Descomenta esto y ajusta las credenciales según tus necesidades)

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


// Realiza la consulta solo si la variable $_GET['titulo'] está definida
/*if(isset($_GET['titulo'])){
    $titulo = $_GET['titulo'];
    // $stmt = $pdo->prepare('SELECT * FROM Noticias WHERE tituloNot=:titulo');
    // $stmt->execute(['titulo' => $titulo]);
    // $dato = $stmt->fetch();
}
else {
    echo("No se recibió nada");
    header("Location: html/index.html");
    exit;  // Finaliza el script después de redirigir
}*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        if(isset($dato['titulo'])) {
            echo htmlspecialchars($dato['titulo']);
        } else {
            echo "Título no encontrado";
        }
        ?>
    </title>
    <style>
        /* ... Tu CSS aquí ... */
    </style>
</head>
<body>

<h2>Lista de Usuarios</h2>

<table>
    <thead>
        <!-- ... -->
    </thead>
    <tbody>
        <tr>
            <?php 
            if(isset($dato)) {
                echo "<td>" . htmlspecialchars($dato['autor']) . "</td>";
                echo "<td>" . htmlspecialchars($dato['imagen']) . "</td>";
                echo "<td>" . htmlspecialchars($dato['texto']) . "</td>";
                echo "<td>" . htmlspecialchars($dato['tituloNot']) . "</td>";
            } else {
                echo "<td colspan='4'>No se encontraron datos</td>";
            }
            ?>
        </tr>
    </tbody>
</table>

</body>
</html>

<?php
// Cerrar la conexión (Descomenta esto si lo necesitas)
// $pdo = null;
?>
