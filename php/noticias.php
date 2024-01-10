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
    echo("error");
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
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo); ?></title>
    <style>
        /* ... Tu CSS aquí ... */
    </style>
</head>
<body>

=======
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
    <link rel = "stylesheet" href="../css/indexCss.css"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>
        <?php 
            if($titulo){
                echo htmlspecialchars($titulo); 
            } else {
                echo htmlspecialchars("Noticias");
            }
        ?>
    </title>
</head>
<body>

<header>
    <h1>CITECH - IPN</h1>
</header>

<nav>
    <a href="../html/index.html">Inicio</a>
    <a href="#noticias">Noticias</a>
    <a href="#about">Acerca de</a>
    <a href="#contacto">Contacto</a>
</nav>

>>>>>>> ProyectoTecnologiasWeb/main
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