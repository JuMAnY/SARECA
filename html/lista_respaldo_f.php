<?php require('../php/sesion/valida_sesion.php'); ?>
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
						<div class="page-header">
							<h1><span class="glyphicon glyphicon-hdd"></span> Base de Datos</h1>
						</div>
						<div class="col-lg-4">
							<div class="well bs-component">
								<form class="form-horizontal">
									<fieldset>
										<legend><span class="glyphicon glyphicon-download-alt"></span> Respaldar a Archivo</legend>
										<div class="form-group">
											<div class="col-lg-4 col-lg-offset-4">
												<a href="../php/respaldo/respaldar_bd.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Respaldar" class="btn btn-primary">Respaldar</a>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
						<div class="col-lg-4">
		                    <?php
	                        $dir='C:\xampp\htdocs\sareca\php\respaldo\archivo';// ruta donde se encuentran los archivos que quiero mostrar
	                        $directorio=opendir($dir);//opendir() funcion para el manejo de archivos
	                        while ($nombre_archivo = readdir($directorio)) $archivos[] = $nombre_archivo;
							$cant = count($archivos)-2;
							if ($cant < 1) {
								closedir($directorio);
							?>
								<div class="alert alert-dismissible alert-info">
									<strong>No existen archivos de respaldo.</strong>
								</div>
							<?php
							}else{
							?>
								<h3><span class="glyphicon glyphicon-repeat"></span> Restaurar Archivo Local</h3>
								<table class="table table-striped table-hover">
									<thead>
										<tr>
											<th>Nombre de Archivos</th>
											<th>Acciones</th>
										</tr>
									</thead>
									<tbody>
									<?php
	                        		$directorio=opendir($dir);//opendir() funcion para el manejo de archivos
			                        while ($archivo=readdir($directorio)){//readdir() funcion para el manejo de archivos
			                            if($archivo=='.' or $archivo=='..') continue;// no muestra el . y .. que estan al principio de las carpetas
									?>
										<tr>
											<td><?=$archivo?></td>
											<td>
												<button type="button" class="btn btn-primary" data-href="../php/respaldo/restaurar_bd.php?a=<?=$archivo?>" data-toggle="modal" data-target="#confirm-action" data-msj="¿Desea restaurar los datos de: <?=$archivo?>?"><span class="glyphicon glyphicon-repeat"></span></button>
												<a href="../php/respaldo/archivo/<?=$archivo?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Descargar" class="btn btn-primary"><span class="glyphicon glyphicon-save-file"></span></a>
												<button type="button" class="btn btn-primary" data-href="../php/respaldo/elim_archivo.php?a=<?=$archivo?>" data-toggle="modal" data-target="#confirm-action" data-msj="¿Desea eliminar el archivo de respaldo: <?=$archivo?>?"><span class="glyphicon glyphicon-trash"></span></button>
											</td>
										</tr>
		                    <?php
		                			}
		                			closedir($directorio);
	                        }
		                    ?>
									</tbody>
								</table>
						</div>
						<div class="col-lg-4">
							<div class="well bs-component">
								<form class="form-horizontal" method='post' action='../php/respaldo/restaurar_bd.php' enctype="multipart/form-data">
									<fieldset>
										<legend><span class="glyphicon glyphicon-repeat"></span> Restaurar Archivo Externo</legend>
										<div class="form-group">
											<div class="col-lg-2 col-lg-offset-5">
												<label class="control-label">Buscar</label>
											</div>
											<input type="file" name="respaldo" title="Click para elegir el archivo de respaldo" required/>
										</div>
										<div class="form-group">
											<div class="col-lg-4 col-lg-offset-4">
												<input class="btn btn-primary" type="submit" value="Restaurar" data-toggle="tooltip" data-placement="right" title="" data-original-title="Restaurar"/>
											</div>
										</div>
									</fieldset>
								</form>
							</div>
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
		<script src="../js/validadores/valida_elim_resp.js"></script>
	</body>
</html>