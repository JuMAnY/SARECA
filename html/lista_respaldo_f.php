<?php require('../php/sesion/valida_sesion.php'); ?>
<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="../imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="../css/estilo.css" rel="stylesheet">
		<script type="text/javascript" src="../js/valida_elim_resp.js"></script>
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
					<th><h2>Restaurar Datos SARECA</h2></th>
				</tr>
				<tr>
					<td align="center">
						<table class="tab_con">
							<caption>Restaurar desde Archivo Local</caption>
							<tr class="tr_con">
								<th class="th_con">Nombre de Archivos</th>
								<th class="th_con">Acciones</th>
							</tr>
		                    <?php
		                        $dir='C:\xampp\htdocs\sareca\php\respaldo\archivo';// ruta donde se encuentran los archivos que quiero mostrar
		                        $directorio=opendir($dir);//opendir() funcion para el manejo de archivos
		                        while ($nombre_archivo = readdir($directorio)) $archivos[] = $nombre_archivo;
								$cant = count($archivos)-2;
		                        closedir($directorio);
								if ($cant < 1) {
							?>
									<tr class="tr_con">
	                                    <td colspan="2" class="td_con">No existen archivos de respaldo.</td>
	                                </tr>
							<?php
								}else{
									$directorio=opendir($dir);
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
					</td>
				</tr>
				<tr>
					<td align="center">
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
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>