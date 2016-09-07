<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$resultado = $_POST['resultado'];
	$observacion_r = $_POST['observacion_r'];
	$fecha_salida = date('Y-m-d');
	$serial = $_POST['serial'];
	$responsable = $_SESSION['id'];
	
	$sql = "UPDATE reparacion
			SET Estado = 2, resultado = '$resultado', observacion_reaparacion = '$observacion_r', Fecha_salida = '$fecha_salida', responsable = '$responsable'
			WHERE Serial_equipo = '$serial'
			AND Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/consulta_equipo_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/consulta_equipo_f.php?m=1&a=modificaron');
		$conectar->close();
	}
?>