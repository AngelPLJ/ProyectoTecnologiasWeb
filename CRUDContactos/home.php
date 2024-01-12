<?php 
require_once("db.php");

$sql = "SELECT * FROM Contactos";
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
				<th class="table-header" width="25%"> Nombre </th>
				<th class="table-header" width="25%"> Email </th>
				<th class="table-header" width="25%"> Acerca de </th>
				<th class="table-header" width="25%"> Mensaje </th>
			  </tr>
		</thead>
		<tbody>		
			<?php
				if ($result->num_rows > 0) {		
					while($row = $result->fetch_assoc()) {
			?>
			<tr class="table-row" id="row-<?php echo $row["id"]; ?>"> 
				<td class="table-row"><?php echo $row["Nombre"]; ?></td>
				<td class="table-row"><?php echo $row["Email"]; ?></td>
				<td class="table-row"><?php echo $row["Acerca"]; ?></td>
				<td class="table-row"><?php echo $row["Comentario"]; ?></td>
				<!-- action -->
			</tr>
			<?php
					}
				}
			?>
		</tbody>
	</table>
</body>
</html>