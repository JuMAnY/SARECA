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
						<div class="col-lg-12">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-hdd"></span> Base de Datos</h1>
							</div>
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
























			
						<table class="tab_con">
							<caption>Restaurar desde Archivo Local</caption>
							<tr class="tr_con">
								<th class="th_con">Nombre de Archivos</th>
								<th class="th_con">Acciones</th>
							</tr>
							<?php
	                        		$directorio=opendir($dir);//opendir() funcion para el manejo de archivos
			                        while ($archivo=readdir($directorio)){//readdir() funcion para el manejo de archivos
			                            if($archivo=='.' or $archivo=='..') continue;// no muestra el . y .. que estan al principio de las carpetas
							?>
			                                <tr class="tr_con">
			                                    <td class="td_con"><?=$archivo?></td>
			                                    <td class="td_con">
		                                        	<input type="button" value="Restaurar" id="" title="Click para restaurar los datos respaldados en este archivo" OnClick="window.location.href='../php/respaldo/restaurar_bd.php?a=<?=$archivo?>'" />
		                                        	<input type="button" value="Descargar" id="" title="Click para descargar este archivo de respaldo" OnClick="window.location.href='../php/respaldo/archivo/<?=$archivo?>'" />
		                                        	<input type="button" value="Eliminar" id="" title="Click para eliminar este archivo de respaldo" OnClick="elim_resp('<?=$archivo?>','')" />
			                                    </td>
			                                </tr>
		                    <?php
		                			}
		                			closedir($directorio);
		                        }
		                    ?>
						</table>

						<FORM  name='form1' method='post' action='../php/respaldo/restaurar_bd.php' enctype="multipart/form-data">
							<table class="tab_con">
								<caption>Restaurar desde Archivo Externo</caption>
								<tr class="tr_con">
									<th class="th_con">Nombre de Archivos</th>
									<th class="th_con">Acciones</th>
								</tr>
								<tr class="tr_con">
									<td class="td_con"><input type="file" name="respaldo" title="Click para elegir el archivo de respaldo" /></td>
									<td class="td_con"><input type="submit" value="Restaurar" title="Click para restaurar los datos respaldados en el archivo elegido" /></td>
								</tr>
							</table>
						</form>
















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