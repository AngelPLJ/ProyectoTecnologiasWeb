<?php 
require_once("db.php");

$sql = "SELECT Usuarios.id_usuarios, Usuarios.nombre, Usuarios.comentario, Usuarios.fechaCom, Noticias.tituloNot AS titulo FROM Usuarios INNER JOIN Noticias ON Usuarios.Noticia = Noticias.id";
$result = $conn->query($sql);	
//$conn->close();		
?>
<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="../logo/CIDETECH.png">
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<title>Noticias</title>
</head>
<body>
	<header>
		<h1>CITECH - IPN</h1>
	</header>

	<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="20%"> Nombre </th>
				<th class="table-header" width="20%"> Comentario </th>
				<th class="table-header" width="20%"> Fecha </th>
				<th class="table-header" width="20%"> Noticia </th>
				<th class="table-header" width="20%"> Accion </th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id_usuarios"]; ?>"> 
				<td class="table-row"><?php echo $row["nombre"]; ?></td>
				<td class="table-row"><?php echo $row["comentario"]; ?></td>
				<td class="table-row"><?php echo $row["fechaCom"]; ?></td>
				<td class="table-row"><?php echo $row["titulo"]; ?></td>
				<!-- action -->
				<td class="table-row" colspan="2"><a href="update.php?id=<?php echo $row["id_usuarios"]; ?>" class="link"><img title="Editar" src="../icon/edit.png"/></a> <a href="delete.php?id=<?php echo $row["id_usuarios"]; ?>" class="link"><img name="delete" id="delete" title="Eliminar" onClick="return confirm('Are you sure you want to delete?')" src="../icon/delete.png"/></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</body>
</html>