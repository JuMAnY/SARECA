<?php require('../php/sesion/valida_sesion.php'); ?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<script type="text/javascript" src="../js/funciones.js"></script>
		<script type="text/javascript" src="../js/valida_conslt_eq_da.js"></script>
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
			<?php include("menu/menu.php");?>
			<table class="tabla">
				<tr>
					<th colspan="2"><h2>Reparación de Equipos</h2></th>
				</tr>
				<tr>
					<td><label for="mes"><div align="right">Mes<span class="red">*</span></label></td>
					<td><input type="month" name="mes" id="mes" title="Debe eligir el mes y año del periodo de reparación" required/></td>
				</tr>
				<tr>
					<td colspan="2">
						<!-- DIV DONDE SE CARGARA LA CONSULTA DE EQUIPOS REPARADOS Y NO REPARADOS -->
						<div id="carga_tabla">
						</div>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>