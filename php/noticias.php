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
// Realiza la consulta solo si la variable $_GET['titulo'] está definida
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
    <link rel = "stylesheet" href="../css/indexCss.css"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>Noticias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        header {
            background-color: #c72f2f;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        nav {
            background-color: #333;
            text-align: center;
            padding: 0.5rem 0;
        }

        nav a {
            margin: 0 15px;
            color: #fff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        nav a:hover {
            background-color: #555;
        }

        h2 {
            margin-top: 20px;
            text-align: center;
            color: #c72f2f;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th,
        table td {
            padding: 10px 15px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        img {
            max-width: 100px;
            height: auto;
        }
    </style>

</head>
<body>
    
<header>
    <h1>CITECH - IPN</h1>
</header>

<nav>
    <a href="../html/index.html">Inicio</a>
    <a href="../php/noticias.php">Noticias</a>
    <a href="../html/AcercaDe.html">Acerca de</a>
    <a href="../html/index.html#contacto">Contacto</a>
</nav>

<h2>Noticias del día</h2>

<table>
    <thead>
        <!-- ... -->
    </thead>
    <tbody>
        <tr>
        <?php while ($row = $dato->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><img src = <?php echo htmlspecialchars($row['imagen']); ?> alt = <?php echo htmlspecialchars($row['imagen']); ?>/></td>
                <td><?php echo htmlspecialchars($row['texto']); ?></td>
                <td><?php echo htmlspecialchars($row['tituloNot']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tr>
    </tbody>
</table>
<footer>
    <p>Soporte <i class='bx bxs-wrench'></i>: luisambro_150@alumno.ipn.mx <br> Derechos de autor © 2023 - CIDETECH  </p>
</footer>
</body>
</html>

<?php
// Cerrar la conexión (Descomenta esto si lo necesitas)
$conexion->close();
?>
