<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$user = $_GET['u'];
	
	$sql = "DELETE FROM usuario WHERE Id  = '$user'";
	$res = $conectar->query($sql);
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($conectar,$sql);
	
	if(!$res){
		header('Location: ../html/elim_usuario_sis_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/elim_usuario_sis_f.php?m=1&a=eliminaron');
		$conectar->close();
	}
?>