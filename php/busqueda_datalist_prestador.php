<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	extract($_POST);
	$sql = "SELECT Cedula, Nombre FROM persona WHERE Cedula LIKE '$variable%'";
	$res_per = $conectar->query($sql);

	if ($res_per->num_rows == 0) {
		echo "<li>Esta cédula no esta registrada</li>";
	} else {
		while ($fila = $res_per->fetch_object())
			echo "<li>". $fila->Cedula ." - ". $fila->Nombre ."</li>";
	}
?>
