<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$serial = $_POST['serial'];
	$fe_pre = date('Y-m-d');
	$id_user = $_SESSION['id'];
	
	$sql = "UPDATE equipo_audiovisual SET Estado = 1 WHERE Serial = '$serial'";
	$res = $conectar->query($sql);
	
	if(!$res){
		header('Location: ../html/devolucion_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		if (isset($_POST['observacion'])) {
			$observacion = $_POST['observacion'];
			$sql = "UPDATE prestamo SET Estado = 1, fecha_devolucion = curDate(), hora_devolucion = curTime(), id_usuario_receptor = '$id_user', observacion_devolucion = '$observacion' WHERE Serial_equipo = '$serial' AND Estado = 2";
		} else {
			$sql = "UPDATE prestamo SET Estado = 1, fecha_devolucion = curDate(), hora_devolucion = curTime(), id_usuario_receptor = '$id_user' WHERE Serial_equipo = '$serial' AND Estado = 2";
		}
		
		$res = $conectar->query($sql);
		
		if(!$res){
			header('Location: ../html/devolucion_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/devolucion_f.php?m=1&a=modificaron');
			$conectar->close();
		}
	}
?>