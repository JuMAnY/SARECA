<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT * FROM reparacion WHERE Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_reparacion.js"></script>
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
			<FORM  name='form1' method='post' action='consulta_reparacion_f.php'>
				<table class="tabla">
					<?php
						if ($res->num_rows == 0) {
					?>
							<tr>
								<th><h2>No existen equipos en reparación.</h2></th>
							</tr>
					<?php
							
						}else{
					?>
							<tr>
								<th><h2>Consulta Equipos en Reparación</h2></th>
							</tr>
							<tr>
								<td align="center">
									<table class="tab_con">
										<tr class="tr_con">
											<th class="th_con">Serial</th>
											<th class="th_con">Nucleo</th>
											<th class="th_con">Departamento</th>
											<th class="th_con">Falla</th>
											<th class="th_con">Observacion</th>
											<th class="th_con">Fecha Entrada</th>
											<th class="th_con">Elegir</th>
										</tr>
										<?php
											while ($fila = $res->fetch_object()) {
												list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
												printf('
													<tr class="tr_con">
														<td class="td_con">%s</td>
														<td class="td_con">%s</td>
														<td class="td_con">%s</td>
														<td class="td_con">%s</td>
														<td class="td_con">%s</td>
														<td class="td_con">%d-%d-%d</td>
														<td class="td_con"><input type="radio" name="serial" value="%s" title="Elegir equipo para reparar"></td>
													</tr>',
													$fila->Serial_equipo,
													$fila->Nucleo,
													$fila->Departamento,
													$fila->falla,
													$fila->observacion,
													$d,
													$m,
													$a,
													$fila->Serial_equipo
												);
											}
										?>
									</table>
								</td>
							</tr>
							<tr>
								<td align="center"><input type="submit" value='Reparar' id="reparar" title="Click para reparar el equipo elegido" /></td>
							</tr>
					<?php
						}
					?>
				</table>
			</form>
		</div>
	</body>
</html>