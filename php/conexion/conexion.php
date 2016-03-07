<?php
	//ZONA HORARIA
	date_default_timezone_set('America/Caracas');
	$conectar = new mysqli('localhost', 'root', '', 'sareca');
	if ($conectar->connect_errno) echo 'Fallo al conectar a MySQL: ('.$conectar->connect_errno .') '.$conectar->connect_error;
?>