<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$nivel = $_POST['nivel'];
	$user = $_POST['user'];
	$pass = md5($_POST['pass']);
	$nombre = $_POST['nombre'];
	
	$sql = "INSERT INTO usuario (Id, Contrasena, Nivel, Nombre) VALUES ('$user','$pass','$nivel','$nombre')";
	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/inicio.php?m=2&e=El ID de usuario "'.$user.'" esta en uso.');
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