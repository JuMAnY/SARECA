<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');

	$sql = "SELECT Serial FROM equipo_audiovisual WHERE Estado = 1";
	$res_equi = $conectar->query($sql);
	
	if(!$res_equi){
		header('Location: inicio.php?m=2&e='.$conectar->error);
		$conectar->close();
		exit();
	}else{
		$sql = "SELECT Carnet FROM persona";
		$res_per = $conectar->query($sql);
	
		if(!$res_per){
			header('Location: inicio.php?m=2&e='.$conectar->error);
			$conectar->close();
			exit();
		}
	}
?>
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
			<FORM  name='form1' method='post' action='../php/prestamo.php'>
				<table class="tabla">
					<tr>
						<th colspan="2"><h2>Prestamos de Equipo</h2></th>
					</tr>
					<?php
						if($res_equi->num_rows == 0){
					?>
							<tr>
								<th colspan="2"><h3>No hay equipos disponibles.</h3></th>
							</tr>
					<?php
						}else{
					?>
							<tr>
								<td><label for="carnet"> <div align="right">Carnet<span class="red">*</span></label></td>
								<td>
									<select name="carnet" id="carnet" title="Debe elegir el número de carnet del profesor" required>
										<option></option>
										<?php
											while ($fila_per = $res_per->fetch_object()) echo '<option value="'.$fila_per->Carnet.'">'.$fila_per->Carnet.'</option>';
											$res_per->free();
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td><label for="Serial_equipo"> <div align="right">Serial<span class="red">*</span> </label></td>
								<td>
									<select name="Serial_equipo" id="Serial_equipo" title="Debe elegir el serial del equipo a prestar" required>
										<option></option>
										<?php
											while ($fila_equi = $res_equi->fetch_object()) echo '<option value="'.$fila_equi->Serial.'">'.$fila_equi->Serial.'</option>';
											$res_equi->free();
											$conectar->close();
										?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="3" align="center">
									<input type="submit" value='Guardar' id="boton" title="Click para guardar los datos" />
									<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
								</td>
							</tr>
					<?php }?>
				</table>
			</form>
		</div>
	</body>
</html>