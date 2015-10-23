<?php
	session_start();
	if($_SESSION["auten"] != 'si'){
		session_destroy();
		header('Location: ../index.php?e=2');
		exit();
	}
?>