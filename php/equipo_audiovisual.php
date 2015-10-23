<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$tipo = $_POST['tipo'];
	$serial = $_POST['Serial'];
	
	$sql = "INSERT INTO equipo_audiovisual (Serial, tipo, Estado) VALUES ('$serial','$tipo',1)";
	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/inicio.php?m=2&e=El equipo de serial "'.$serial.'" esta registrado.');
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