<?php require('../php/sesion/valida_sesion.php');?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_camb_pass.js"></script>
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
			<FORM  name='form1' method='post' action='../php/cambio_pass.php'>
				<table class="tabla">
					<tr>
						<th colspan="2"><h2>Cambio Contraseña Usuario</h2></th>
					</tr>
					<tr>
						<td><label for="pass"> <div align="right">Nueva Contraseña<span class="red">*</span></label></td>
						<td><input type="password" name="pass" id="pass" placeholder="Contraseña" size="21" title="Debe ingresar la contraseña del usuario" required /><td>
					</tr>
					<tr>
						<td><label for="re_pass"> <div align="right">Repita Contraseña<span class="red">*</span></label></td>
						<td><input type="password" name="re_pass" id="re_pass" placeholder="Repita la Contraseña" size="21" title="Repita la contraseña que ingreso" required /><td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value='Cambiar' id="cambiar" title="Click para cambiar la contraseña" />
							<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>