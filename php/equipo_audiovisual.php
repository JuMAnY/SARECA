<?php
	require('sesion/valida_sesion.php');
	require('conexion/conexion.php');
	
	$tipo = $_POST['tipo'];
	$serial = $_POST['Serial'];
	$numero = $_POST['numero'];
	$rbn = $_POST['rbn'];
	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	
	if (isset($_POST['inf_adic'])) {
		$inf_adic = $_POST['inf_adic'];
		$sql = "INSERT INTO equipo_audiovisual (Serial, tipo, numero, rbn, modelo, marca, inf_adic, Estado) VALUES ('$serial','$tipo','$numero','$rbn','$marca','$modelo','$inf_adic',1)";
	} else {
		$sql = "INSERT INTO equipo_audiovisual (Serial, tipo, numero, rbn, modelo, marca, Estado) VALUES ('$serial','$tipo','$numero','$rbn','$marca','$modelo',1)";
	}

	$res = $conectar->query($sql);
	
	if(!$res){
		if ($conectar->errno == 1062) {
			header('Location: ../html/equipo_audiovisual_f.php?m=2&e=El equipo de serial "'.$serial.'" ya está registrado.');
			$conectar->close();
			exit();
		}else{
			header('Location: ../html/equipo_audiovisual_f.php?m=2&e='.$conectar->error.', N°: '.$conectar->errno);
			$conectar->close();
			exit();
		}
	}else{
		header('Location: ../html/equipo_audiovisual_f.php?m=1&a=registraron');
		$conectar->close();
	}
?>