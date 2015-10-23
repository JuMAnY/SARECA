<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$carnet = $_POST['carnet'];
	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$departamento = $_POST['departamento'];
	$cargo = $_POST['cargo'];
	
	$sql = "INSERT INTO persona (Carnet, Cedula, Nombre, Departamento, Cargo) VALUES ('$carnet','$cedula','$nombre','$departamento','$cargo')";
	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/inicio.php?m=2&e=El el usuario de carnet "'.$carnet.'" esta registrado.');
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/inicio.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}
	}else{
		header('Location: ../html/inicio.php?m=1&a=registraron');
		$conectar->close();
	}
?>