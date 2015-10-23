<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$user = $_GET['u'];
	
	$sql = "DELETE FROM usuario WHERE Id  = '$user'";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/inicio.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/inicio.php?m=1&a=eliminaron');
		$conectar->close();
	}
?>