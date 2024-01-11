<?php 
require_once("db.php");

$sql = "SELECT * FROM Noticias";
$result = $conn->query($sql);	
//$conn->close();		
?>
<html>
<head>
	<link href="../css/style.css" rel="stylesheet" type="text/css" />
	<title>Noticias</title>
</head>
<body>
	<div class="button_link"><a href="create.php">Añadir una nueva noticia</a></div>
	<table class="tbl-qa">	
		<thead>
			 <tr>
				<th class="table-header" width="20%"> Autor </th>
				<th class="table-header" width="20%"> Imagen </th>
				<th class="table-header" width="20%">Título </th>
				<th class="table-header" width="20%">Texto</th>
				<th class="table-header" width="20%">Acción</th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id_noticia"]; ?>"> 
				<td class="table-row"><?php echo $row["autor"]; ?></td>
				<td class="table-row"><?php echo $row["imagen"]; ?></td>
				<td class="table-row"><?php echo $row["tituloNot"]; ?></td>
				<td class="table-row"><?php echo $row["texto"]; ?></td>
				<!-- action -->
				<td class="table-row" colspan="2"><a href="update.php?id=<?php echo $row["id"]; ?>" class="link"><img title="Edit" src="../icon/edit.png"/></a> <a href="delete.php?id=<?php echo $row["id"]; ?>" class="link"><img name="delete" id="delete" title="Delete" onClick="return confirm('Are you sure you want to delete?')" src="../icon/delete.png"/></a></td>
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</body>
</html>