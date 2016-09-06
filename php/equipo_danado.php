<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$nucleo = $_POST['Nucleo'];
	$serial = $_POST['serial'];
	$departamento = $_POST['departamento'];
	$descripcion = $_POST['descripcion'];
	$observacion = $_POST['Observacion'];
	$fecha_entrada = date('Y-m-d');
	$estado = $_POST['estado'];
	$responsable = $_SESSION['id'];
	
	$sql = "INSERT INTO reparacion (Serial_equipo, Nucleo, Departamento, falla, Estado, observacion, Fecha_entrada, resultado, responsable) VALUES ('$serial','$nucleo','$departamento','$descripcion',1,'$observacion','$fecha_entrada',1,'$responsable')";
	$res = $conectar->query($sql);
	
	if (!$res) {
		if ($conectar->errno == 1062) {
			header('Location: ../html/equipo_danado_f.php?m=2&e=El equipo de serial "'.$serial.'" esta registrado.');
			$conectar->close();
			exit();
		} else {
			header('Location: ../html/equipo_danado_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}
	} else {
		header('Location: ../html/equipo_danado_f.php?m=1&a=registraron');
		$conectar->close();
	}
?>