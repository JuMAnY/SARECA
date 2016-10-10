<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$carnet = $_POST['carnet'];
	$carrera = $_POST['carrera'];
	$serial = $_POST['Serial_equipo'];
	$fe_pre = date('Y-m-d');
	$id_user = $_SESSION['id'];


	$sql = "INSERT INTO prestamo (Serial_equipo, Fecha_prestamo, hora_prestamo, Id_usuario, Carnet, carrera, Estado) VALUES ('$serial','$fe_pre',curTime(),'$id_user','$carnet','$carrera',2)";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/prestamo_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		$sql = "UPDATE equipo_audiovisual SET Estado = 2 WHERE Serial = '$serial'";
		$res = $conectar->query($sql);
		
		if(!$res){
			header('Location: ../html/prestamo_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/prestamo_f.php?m=1&a=registraron');
			$conectar->close();
		}
	}
?>