<?php
	session_start();
	unset($_SESSION['id']); 
	unset($_SESSION['nombre']);
	unset($_SESSION['nivel']);
	session_destroy();
	header("Location: ../../index.php");
	exit();
?>