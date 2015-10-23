<?php require('../php/sesion/valida_sesion.php');?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/funciones.js"></script>
	</head>
	<body>
		<div class="contenedor">
			<div class="membrete">
				<img title="Gobierno Bolivariano de Venezuela" src="../imagen/gobierno.jpg" width="800px" height="78px"><br>	
				<img title="Logo de Sistema" src="../imagen/logo.jpg" width="100px" height="100px" align="left">
				<img title="Instituto Universitario Tecnol&oacute;gico de Ejido" src="../imagen/uptm.jpg" width="90px" height="100px" align="right" > 
				<h1> Sistema automatizado registro equipos de computacion y audiovisuales "SARECA"</h1>
				<div class="nombre"><h4>Bienvenido:<?=' '.$_SESSION['nombre']?></h4></div>
			</div>
			<?php
				include("menu/menu.php");
				if(isset($_GET['m']) && $_GET['m'] == 1) {
					include('mensaje/correcto.html');
					exit();				
				}elseif(isset($_GET['m']) && $_GET['m'] == 2) {
					include('mensaje/error.html');
					exit();				
				}
				if($_SESSION['nivel'] == 3 || $_SESSION['nivel'] == 1) include('inicio/inicio_rep.php');
				if($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 1) include('inicio/inicio_pres.php');
			?>
		</div>
	</body>
</html>