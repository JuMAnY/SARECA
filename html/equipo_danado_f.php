<?php require('../php/sesion/valida_sesion.php');?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_equip_d.js"></script>
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
			<FORM  name='form1' method='post' action='../php/equipo_danado.php'>
				<table class="tabla">
					<tr>
						<th colspan="3"><h2>Registro de equipos Da&ntilde;ados</h2></th>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<label> Nucleo <span class="red">*</span></label>
							<input type="radio" name="Nucleo" value="Ejido"><label for="estu">Ejido</label>
							<input type="radio" name="Nucleo" value="Bailadores"><label for="doce">Bailadores</label>
							<input type="radio" name="Nucleo" value="Santa Lucia"><label for="visi">Santa lucia</label>
							<input type="radio" name="Nucleo" value="Tucani"><label for="tu">Tucani</label>
							<input type="radio" name="Nucleo" value="Manejo de Emergencias"><label for="ma">Manejo de Emergencia</label>
						</td>
					</tr>
						<td><label for="Serial"> <div align="right"> Serial <span class="red">*</span></label></td>
						<td><input name="serial" id="Serial" type="text" placeholder="Serial de Equipo" size="21" required title="Debe ingresar el serial del equipo" pattern="[a-zA-Z0-9]*"><td>
					</tr>
					<tr>
						<td><label for="departamento"> <div align="right"> Departamento <span class="red">*</span></label></td>
						<td><input name="departamento" id="departamento" type="text" placeholder="Area Departamento"size="21" required title="Debe ingresar el departamento al que pertenece el equipo" pattern="[a-zA-Z0-9 ]*"><td>
					</tr>
					<tr>	
						<td><label for="descripcion"> <div align="right"> Falla <span class="red">*</span></label></td>
						<td><textarea name="descripcion" id="descripcion" rows="5" cols="30" placeholder="Descripci&oacute;n de falla" required title="Debe ingresar la descripcion de la falla del equipo"></textarea><td>
					</tr>
					<tr>	
						<td><label for="Observacion"> <div align="right"> Observación Equipo<span class="red">*</span></label></td>
						<td><textarea name="Observacion" id="Observacion" rows="5" cols="30" placeholder="Observaci&oacute;n de Equipo" required title="Debe ingresar los detalles del equipo"></textarea><td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value='Guardar' id="guardar" title="Click para guardar los datos del equipo" />
							<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>