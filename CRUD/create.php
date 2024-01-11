<?php
// Datos de conexión
$host = 'localhost';
$db   = 'ProyectoWEB';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Crear conexión
$conexion = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Procesar el formulario
$mensaje = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = $_POST['autor'];
    $imagen = $_POST['imagen'];
    $texto = $_POST['texto'];
    $tituloNot = $_POST['tituloNot'];

    $sql = "INSERT INTO Noticias (autor, imagen, texto, tituloNot) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);

    // Verificar la preparación de la consulta
    if ($stmt) {
        $stmt->bind_param("ssss", $autor, $imagen, $texto, $tituloNot);
        if ($stmt->execute()) {
            $mensaje = "Noticia creada correctamente.";
        } else {
            $mensaje = "Error al crear la noticia: " . $stmt->error;
        }
    } else {
        $mensaje = "Error al preparar la consulta: " . $conexion->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Noticia</title>
    <link rel="stylesheet" href="ruta_a_tu_archivo_css.css"> <!-- Asegúrate de incluir tus estilos CSS -->
<style>
/* Estilos generales */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 600px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-top: 10px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-top: 20px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Estilos adicionales para responsividad */
@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    input[type="submit"] {
        font-size: 16px;
    }
}


</style>
</head>
<body>

<h2>Crear Noticia</h2>

<?php if ($mensaje): ?>
    <p><?php echo $mensaje; ?></p>
<?php endif; ?>

<form action="" method="post">
    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="autor" required>
    <br>
    <label for="imagen">URL de la imagen:</label>
    <input type="text" id="imagen" name="imagen" required>
    <br>
    <label for="texto">Texto:</label>
    <textarea id="texto" name="texto" rows="10" required></textarea>
    <br>
    <label for="tituloNot">Título:</label>
    <input type="text" id="tituloNot" name="tituloNot" required>

    <input type="submit" value="Crear Noticia">
</form>

</body>
</html>