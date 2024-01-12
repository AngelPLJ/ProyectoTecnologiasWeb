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
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
else{
    header("Location: noticias.php");
    exit();
}

$sql= "SELECT * FROM Noticias WHERE id=?";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("s",$id);
$stmt->execute();
$datos=$stmt->get_result();
$dato = $datos->fetch_assoc();

$sql = "SELECT * FROM usuarios WHERE Noticia=? ORDER BY fechaCom DESC";
$stmt=$conexion->prepare($sql);
$stmt->bind_param("s",$id);
$stmt->execute();
$comentarios=$stmt->get_result();

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
    <link rel = "stylesheet" href="../css/noticia.css"/>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <title>
        <?php 
            echo htmlspecialchars($dato['tituloNot']); 
        ?>
    </title>
    <script src="../js/noticia.js" defer></script>
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

<div style="text-align:center;">
    <h1><?php echo htmlspecialchars($dato['tituloNot']); ?></h1>
    <br/>
    <img style="width: 100%;" src=<?php echo htmlspecialchars($dato['imagen']); ?> alt=<?php echo htmlspecialchars($dato['imagen']); ?>/>
    <br/>
    <h2>Presentado por: <?php echo htmlspecialchars($dato['autor']); ?></h2>
    <p style="text-align: justify;"><?php echo htmlspecialchars($dato['texto']); ?></p>
</div>

<h2>Comentarios:</h2>

    <?php while ($row = $comentarios->fetch_assoc()):?>
    <p><strong><?php echo htmlspecialchars($row['nombre'])?></strong> <?php echo htmlspecialchars($row['fechaCom'])?>:<br><?php echo htmlspecialchars($row['comentario'])?></p>
    <?php endwhile; ?>
    <hr>
    <h2>Agregar un Comentario:</h2>
    <form onsubmit="noticia()">
        <label style="display: none;" id="id" data-redirect="<?php echo htmlspecialchars($id)?>"></label>
        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre" required><br>

        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" required></textarea><br>

        <input type="submit" value="Agregar Comentario">
    </form>

<footer>
    <p>Soporte <i class='bx bxs-wrench'></i>: luisambro_150@alumno.ipn.mx <br> Derechos de autor © 2023 - CITECH  </p>
</footer>

</body>
</html>

<?php
// Cerrar la conexión (Descomenta esto si lo necesitas)
$conexion->close();
?>
