<?php
	require('../php/sesion/valida_sesion.php');
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT Id,Nivel,Nombre FROM usuario";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>SARECA</title>
		<meta name="description" content="SARECA">
		<meta name="keywords" content="inventario, equipos, sareca">
		<meta name="author" content="JuMAnY">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../css/bootstrap.css">
		<link rel="stylesheet" href="../css/general.css">
	</head>
	<body>
		<div id="wrap">
			<?php
				include("menu/menu.php");
			?>
			<!-- INICIO DEL CONTENEDOR DE LA PAGINA -->
			<div class="container">
				<div class="bs-docs-section">
					<?php
						include('mensaje/mensaje.php');
					?>
					<div class="row">
						<div class="col-lg-12">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-user"></span> Usuarios</h1>
							</div>
							<h3><span class="glyphicon glyphicon-trash"></span> Eliminar</h3>
							<table class="table table-striped table-hover">
								<thead>
									<tr>
										<th>Nombre Y Apellido</th>
										<th>Nivel</th>
										<th>Elegir</th>
									</tr>
								</thead>
								<tbody>
									<?php
									while ($fila = $res->fetch_object()) {
										if($fila->Id == $_SESSION['id']) continue;
										if($fila->Nivel == 1) $nivel  = 'Administrador';
										if($fila->Nivel == 2) $nivel  = 'Dep. AudioVisuales';
										if($fila->Nivel == 3) $nivel  = 'Dep. Reparación';
										printf('
											<tr>
												<td>%s</td>
												<td>%s</td>
												<td data-toggle="tooltip" data-placement="right" title="" data-original-title="Eliminar"><a href="#" data-href="../php/elim_usuario_sis.php?u=%s" data-toggle="modal" data-target="#confirm-action" data-msj="¿Desea eliminar el usuario: %s?" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span></a></td>
											</tr>',
											$fila->Nombre,
											$nivel,
											$fila->Id,
											$fila->Nombre
										);
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- FIN DEL CONTENEDOR DE LA PAGINA -->
			<!-- DIV para manejar el footer de manera dinamica -->
			<div id="push"></div>
		</div>
		<!-- INICIO DEL PIE DE PAGINA -->
		<div id="footer">
			<div class="container">
				<p class="muted credit">
					Todos los derechos reservados &copy 2015 <br>
					SARECA | <b>JuMAnY</b>
				</p>
			</div>
		</div>
		<!-- FIN DEL PIE DE PAGINA -->

		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/config.js"></script>
		<script src="../js/validadores/funciones.js"></script>
		<script src="../js/validadores/valida_elim_usuario_sis.js"></script>
	</body>
</html>