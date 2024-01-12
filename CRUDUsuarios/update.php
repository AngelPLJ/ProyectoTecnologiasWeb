<?php
	require_once("db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE Usuarios SET nombre=? , comentario=? WHERE id_usuarios=?");
		$nombre = $_POST['nombre'];
		$comentario = $_POST['comentario'];
		$sql->bind_param("ssi",$nombre, $comentario, $_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT id_usuarios, nombre, comentario, fechaCom, Noticia FROM Usuarios WHERE id_usuarios=?");
	$sql->bind_param("i",$_GET["id"]);			
	$sql->execute();
	$result = $sql->get_result();
	if ($result->num_rows > 0) {		
		$row = $result->fetch_assoc();
	}
	$conn->close();
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
<style>
.tbl-qa{border-spacing:0px;border-radius:4px;border:#6ab5b9 1px solid;}
</style>
<title>Editar Contenido Usuarios</title>
</head>
<body>
	<header>
		<h1>CITECH - IPN</h1>
	</header>
<?php if(!empty($success_message)) { ?>
<div class="success message"><?php echo $success_message; ?></div>
<?php } if(!empty($error_message)) { ?>
<div class="error message"><?php echo $error_message; ?></div>
<?php } ?>
<form name="frmUser" method="post" action="">
<div class="button_link"><a href="home.php" >Back to List </a></div>
<table border="0" cellpadding="10" cellspacing="0" width="500" align="center" class="tbl-qa">
	<thead>
		<tr>
			<th colspan="2" class="table-header">Editar Información Usuarios</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>Nombre</label></td>
			<td><input type="text" name="nombre" class="txtField" value="<?php echo $row["nombre"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Comentario</label></td>
			<td><input type="text" name="comentario" class="txtField" value="<?php echo $row["comentario"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Enviar" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>