<?php 
    require_once("db.php");
	
	$sql = $conn->prepare("DELETE  FROM Usuarios WHERE Noticia=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();

	$sql = $conn->prepare("DELETE  FROM Noticias WHERE id=?");  
	$sql->bind_param("i", $_GET["id"]); 
	$sql->execute();
	$sql->close(); 
	$conn->close();
	header('location:home.php');		
?>