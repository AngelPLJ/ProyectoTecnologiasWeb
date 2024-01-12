<?php 
    require_once("db.php");
	
	$sql = $conn->prepare("DELETE  FROM Usuarios WHERE id_usuarios=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:home.php');		
?>