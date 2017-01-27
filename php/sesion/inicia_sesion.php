<?php
	include('../conexion/conexion.php');
	
	$user = $_POST['usuario'];
	$pass = md5($_POST['pass']);
	
	$sql = "SELECT Id, Contrasena, Nombre, Nivel FROM usuario WHERE Id='$user'";
	$resultado = $conectar->query($sql);
	
	$fila = $resultado->fetch_object();	
	$id = $fila->Id;
	$pass_bd = $fila->Contrasena;			
	
	if($pass_bd == $pass && $id == $user){				   
		session_start();
		$_SESSION['auten'] = 'si';
		$_SESSION['id'] = $id;
		$_SESSION['nombre'] = $fila->Nombre;
		$_SESSION['nivel'] = $fila->Nivel;
		//SE ALMACENA LA SENTENCIA SQL
		$_SESSION["sentencia"] = $sql;
		//LLAMADO DE LA FUNCION QUE REGISTRA LA BITACORA DE ACCIONES DEL USUARIO
		bitacora($conectar,$sql);
		$resultado->free();
		$conectar->close();
		header('Location: ../../html/inicio.php');
	}else{
		$resultado->free();
		$conectar->close();
		header('Location: ../../index.php?e=1');
	}
?>