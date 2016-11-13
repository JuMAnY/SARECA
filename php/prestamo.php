<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$cedula = $_POST['cedula'];
	$serial = $_POST['Serial_equipo'];
	$hora_estimada = $_POST['hora_estimada_devolucion'];
	$destino = $_POST['destino'];
	$fe_pre = date('Y-m-d');
	$id_user = $_SESSION['id'];
	if (isset($_POST['observacion'])) {
		$observacion = $_POST['observacion'];
		$sql = "INSERT INTO prestamo (Serial_equipo, Fecha_prestamo, hora_prestamo, hora_estimada_devolucion, destino, Id_usuario_prestador, Cedula, Estado, observacion_prestamo) VALUES ('$serial','$fe_pre',curTime(),'$hora_estimada','$destino','$id_user','$cedula',2,'$observacion')";
	} else {
		$sql = "INSERT INTO prestamo (Serial_equipo, Fecha_prestamo, hora_prestamo, hora_estimada_devolucion, destino, Id_usuario_prestador, Cedula, Estado) VALUES ('$serial','$fe_pre',curTime(),'$hora_estimada','$destino','$id_user','$cedula',2)";
	}

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