<?php
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
if(isset($_GET['titulo'])){
    $titulo=$_GET['titulo'];

}
else{
    header("Location: noticias.php");
    exit();
}

$sql= "SELECT * FROM Noticias WHERE tituloNot=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("s",$titulo);
$stmt->execute();
$dato=$stmt->get_result();
// Realiza la consulta solo si la variable $_GET['titulo'] está definida
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
            echo htmlspecialchars($titulo); 
        ?>
    </title>
</head>
<body>
<h2>Lista de Usuarios</h2>

<table>
    <thead>
        <!-- ... -->
    </thead>
    <tbody>
        <tr>
        <?php while ($row = $dato->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['imagen']); ?></td>
                <td><?php echo htmlspecialchars($row['texto']); ?></td>
                <td><?php echo htmlspecialchars($row['tituloNot']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tr>
    </tbody>
</table>

</body>
</html>

<?php
// Cerrar la conexión (Descomenta esto si lo necesitas)
$conexion->close();
?>
