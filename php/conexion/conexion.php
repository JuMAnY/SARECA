<?php
	//ZONA HORARIA
	date_default_timezone_set('America/Caracas');
	$conectar = new mysqli('localhost', 'root', 'root', 'sareca');
	if ($conectar->connect_errno) 
		echo 'Fallo al conectar a MySQL: ('.$conectar->connect_errno .') '.$conectar->connect_error;

	function bitacora($cnx_bd,$sql_e){

		$usuario = $_SESSION["id"];
		$nombre = $_SESSION["nombre"];
		$sentencia = mysql_real_escape_string($sql_e);

		$sql = "INSERT INTO bitacora (id_usuario,nombre,sentencia)
				VALUES ('$usuario','$nombre','$sentencia')";
				
		$cnx_bd->query($sql);
	}
?>