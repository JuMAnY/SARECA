<?php require('../php/sesion/valida_sesion.php');?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_equ_audio.js"></script>
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
			<?php include("menu/menu.php");?>
			<FORM  name='form1' method='post' action='../php/equipo_audiovisual.php'>
				<table class="tabla">
					<tr>
						<th colspan="3"><h2>Equipo Audiovisual</h2></th>
					</tr>
					<tr>
						<td colspan="3" align="center">
							<label> Tipo de Equipo <span class="red">*</span></label>
							<input type="radio" name="tipo" value="1" id="vb"><label for="vb">Video Beam</label>
							<input type="radio" name="tipo" value="2" id="rpy"><label for="rpy">Retroproyector</label>
						</td>
					</tr>
					<tr>
						<td><label for="Serial"> <div align="right"> Serial <span class="red">*</span> </label></td>
						<td><input name="Serial" id="Serial" type="text" placeholder="Codigo de equipo" size="21" title="Debe ingresar el serial del equipo" pattern="[a-zA-Z0-9]*" required/><td>
					</tr>
					<td colspan="3" align="center">
						<input type="submit" value='Guardar' id="boton" title="Click para guardar los datos" />
						<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
					</td>
				</table>
			</form>
		</div>
	</body>
</html>