<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	$serial = $_POST['serial'];
	
	$sql = "SELECT *
			FROM reparacion
			WHERE Serial_equipo = '$serial'
			AND Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}

	$fila = $res->fetch_object();
	list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_fin_repr.js"></script>
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
			<FORM  name='form1' method='post' action='../php/finaliza_reparacion.php'>
				<table class="tabla">
					<tr>
						<th colspan="3"><h2>Datos del Equipo</h2></th>
					</tr>
					<tr>
						<td><label><div align="right">Nucleo<span class="red">*</span></label></td>
						<td><input name="nucleo" type="text" value="<?=$fila->Nucleo?>" size="21" readonly><td>
					</tr>
					<tr>
						<td><label for="Serial"> <div align="right"> Serial <span class="red">*</span></label></td>
						<td><input name="serial" id="Serial" type="text" value="<?=$fila->Serial_equipo?>" size="21" readonly><td>
					</tr>
					<tr>
						<td><label for="departamento"> <div align="right"> Departamento <span class="red">*</span></label></td>
						<td><input name="departamento" id="departamento" type="text" value="<?=$fila->Departamento?>" size="21" readonly><td>
					</tr>
					<tr>	
						<td><label for="descripcion"> <div align="right"> Falla <span class="red">*</span></label></td>
						<td><textarea name="descripcion" id="descripcion" rows="5" cols="30" placeholder="Descripci&oacute;n de falla " readonly><?=$fila->falla?></textarea><td>
					</tr>
					<tr>	
						<td><label for="Observacion"> <div align="right"> Observación Equipo<span class="red">*</span></label></td>
						<td><textarea name="Observacion" id="Observacion" rows="5" cols="30" placeholder="Observaci&oacute;n de Equipo" readonly><?=$fila->observacion?></textarea><td>
					</tr>
					<tr>	
						<td><label for="Fecha_entrada"> <div align="right"> Fecha Entrada <span class="red">*</span></label></td>
						<td><input type="text" name="Fecha_entrada" id="Fecha_entrada" value="<?=$d.'-'.$m.'-'.$a?>" readonly><td>
					</tr>
					<tr>
						<th colspan="3"><h2>Datos de la Reparacion</h2></th>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<label>Resultado<span class="red">*</span></label>
							<input type="radio" name="resultado" value="1" id="norepd"><label for="norepd">No Reparado</label>
							<input type="radio" name="resultado" value="2" id="repd"><label for="repd">Reparado</label>
						</td>
					</tr>
					<tr>	
						<td><label for="Observacion_r"> <div align="right"> Observación Reparación<span class="red">*</span></label></td>
						<td><textarea name="observacion_r" id="Observacion_r" rows="5" cols="30" placeholder="Observaci&oacute;n de la Reparacion" title="Debe ingresar los detalles del proceso de reparación" required></textarea><td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="submit" value='Finalizar' id="boton" title="Click para finalizar el proceso de reparacion de este equipo" />
							<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
						</td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>