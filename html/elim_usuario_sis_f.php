<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT Id,Nivel,Nombre FROM usuario";
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
		<script type="text/javascript" src="../js/valida_elim_usuario_sis.js"></script>
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
			<table class="tabla">
				<tr>
					<th><h2>Usuarios del Sistema</h2></th>
				</tr>
				<tr>
					<td align="center">
						<table class="tab_con">
							<tr class="tr_con">
								<th class="th_con">Nombre Y Apellido</th>
								<th class="th_con">Nivel</th>
								<th class="th_con">Elegir</th>
							</tr>
							<?php
								while ($fila = $res->fetch_object()) {
									if($fila->Id == $_SESSION['id']) continue;
									if($fila->Nivel == 1) $nivel  = 'Administrador';
									if($fila->Nivel == 2) $nivel  = 'Dep. AudioVisuales';
									if($fila->Nivel == 3) $nivel  = 'Dep. Reparación';
									printf('
										<tr class="tr_con">
											<td class="td_con">%s</td>
											<td class="td_con">%s</td>
											<td class="td_con"><input type="button" value="Eliminar" id="eliminar" title="Click para eliminar este usuario" OnClick="elim_user(\'%s\',\'%s\')" /></td>
										</tr>',
										$fila->Nombre,
										$nivel,
										$fila->Nombre,
										$fila->Id
									);
								}
							?>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>