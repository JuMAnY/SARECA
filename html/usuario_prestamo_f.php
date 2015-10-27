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
			<?php include("menu/menu.php");?>
			<FORM  name='form1' method='post' action='../php/usuario_prestamo.php'>
				<table class="tabla">
					<tr>
						<th colspan="2"><h2>Registro Usuarios de Prestamos</h2></th>
					</tr>
					<tr>
						<td><label for="carnet"> <div align="right">Carnet<span class="red">*</span></label></td>
						<td><input name="carnet" id="carnet" type="number" placeholder="Carnet del Profesor" size="21" required title="Debe ingresar el número de carnet del profesor" /><td>
					</tr>
					<tr>
						<td><label for="cedula"> <div align="right">Cédula<span class="red">*</span></label></td>
						<td><input name="cedula" id="cedula" type="number" placeholder="Cédula del Profesor"size="21" required title="Debe ingresar el número de cédula del profesor" /><td>
					</tr>
					<tr>
						<td><label for="nombre"> <div align="right">Nombre<span class="red">*</span></label></td>
						<td><input name="nombre" id="nombre" type="text" placeholder="Nombre y Apellido del profesor" size="21" required title="Debe ingresar el nombre completo del profesor" pattern="[a-zA-Z ]*"><td>
					</tr>
					<tr>
						<td><label for="departamento"> <div align="right"> Departamento <span class="red">*</span></label></td>
						<td><input name="departamento" id="departamento" type="text" placeholder="Area Departamento"size="21" required title="Debe ingresar el departamento al que pertenece el profesor" pattern="[a-zA-Z0-9 ]*"><td>
					</tr>
					<tr>
						<td><label for="cargo"> <div align="right">Cargo<span class="red">*</span></label></td>
						<td><input name="cargo" id="cargo" type="text" placeholder="Cargo del profesor"size="21" required title="Debe ingresar el cargo que ocupa el profesor" pattern="[a-zA-Z ]*"><td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value='Guardar' id="guardar" title="Click para guardar los datos del usuario de prestamos" />
							<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>