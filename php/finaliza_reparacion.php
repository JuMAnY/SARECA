<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$resultado = $_POST['resultado'];
	$observacion_r = $_POST['observacion_r'];
	$fecha_salida = date('Y-m-d');
	$serial = $_POST['serial'];
	
	$sql = "UPDATE reparacion
			SET Estado = 2, resultado = '$resultado', observacion_reaparacion = '$observacion_r', Fecha_salida = '$fecha_salida'
			WHERE Serial_equipo = '$serial'
			AND Estado = 1";
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