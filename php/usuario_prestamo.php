<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$carrera = $_POST['carrera'];
	
	$sql = "INSERT INTO persona (Cedula, Nombre, carrera) VALUES ('$cedula','$nombre','$carrera')";
	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/usuario_prestamo_f.php?m=2&e=El el usuario de carnet "'.$carnet.'" esta registrado.');
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/usuario_prestamo_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}
	}else{
		header('Location: ../html/usuario_prestamo_f.php?m=1&a=registraron');
		$conectar->close();
	}
?>