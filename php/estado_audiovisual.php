<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$serial = $_GET['s'];
	$estado = $_GET['e'];

	$e = ($estado == 1) ? 3 : 1;

	$sql = "UPDATE equipo_audiovisual SET Estado = '$e' WHERE Serial = '$serial'";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/consulta_audiovisuales_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/consulta_audiovisuales_f.php?m=1&a=modificaron');
		$conectar->close();
	}
?>