<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$correo = $_POST['correo'];
	$id = $_SESSION['id'];
	
	$sql = "UPDATE usuario SET correo = '$correo' WHERE Id = '$id'";
	$res = $conectar->query($sql);
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($conectar,$sql);
	
	if(!$res){
		header('Location: ../html/cambio_email_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/cambio_email_f.php?m=1&a=modificaron');
		$conectar->close();
	}
?>