<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$pass = md5($_POST['pass']);
	$id = $_SESSION['id'];
	
	$sql = "UPDATE usuario SET Contrasena = '$pass' WHERE Id = '$id'";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/inicio.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/inicio.php?m=1&a=modificaron');
		$conectar->close();
	}
?>