<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$serial = (isset($_GET['s'])) ? $_GET['s'] : $_POST['serial'];
	$estado = (isset($_GET['e'])) ? $_GET['e'] : $_POST['estado'];
	$motivo = $_POST['motivo'];

	$e = ($estado == 1) ? 3 : 1;

	$sql = "UPDATE equipo_audiovisual SET Estado = '$e' WHERE Serial = '$serial'";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}
	//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
	bitacora($conectar,$sql);
	if ($e == 3) {
		$sql = "INSERT INTO motivo_equipo_inactivo (motivo, equipo_serial) VALUES ('$motivo', '$serial')";
		$conectar->query($sql);
	}

	if(!$res){
		header('Location: ../html/consulta_audiovisuales_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
		$conectar->close();
		exit();
	}else{
		header('Location: ../html/consulta_audiovisuales_f.php?m=1&a=modificaron');
		$conectar->close();
	}
?>