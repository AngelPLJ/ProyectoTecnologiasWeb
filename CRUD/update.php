<?php
	require_once("db.php");
	if (isset($_POST['submit'])) {		
		$sql = $conn->prepare("UPDATE Noticias SET autor=? , imagen=? , tituloNot=? , texto=?  WHERE id=?");
		$autor = $_POST['autor'];
		$imagen = $_POST['imagen'];
		$tituloNot =$_POST['tituloNot'];
		$texto =$_POST['texto'];
		$sql->bind_param("ssssi",$autor, $imagen,$tituloNot,$texto,$_GET["id"]);	
		if($sql->execute()) {
			$success_message = "Edited Successfully";
		} else {
			$error_message = "Problem in Editing Record";
		}

	}
	$sql = $conn->prepare("SELECT * FROM Noticias WHERE id=?");
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
<title>Editar Contenido Noticia</title>
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
			<th colspan="2" class="table-header">Editar Información Noticia</th>
		</tr>
	</thead>
	<tbody>
		<tr class="table-row">
			<td><label>autor</label></td>
			<td><input type="text" name="autor" class="txtField" value="<?php echo $row["autor"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>imagen</label></td>
			<td><input type="text" name="imagen" class="txtField" value="<?php echo $row["imagen"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Titulo</label></td>
			<td><input type="text" name="tituloNot" class="txtField" value="<?php echo $row["tituloNot"]?>"></td>
		</tr>
		<tr class="table-row">
			<td><label>Texto</label></td>
			<td><input type="text" name="texto" class="txtField" value="<?php echo $row["texto"]?>"></td>
		</tr>
		<tr class="table-row">
			<td colspan="2"><input type="submit"  name="submit" value="Enviar" class="demo-form-submit"></td>
		</tr>
	</tbody>	
</table>
</form>
</body>
</html>