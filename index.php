<html>
	<head>
		<title>SARECA</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link type="image/x-icon" href="imagen/logo.ico" rel="shortcut icon" />
		<link type="text/css" href="css/estilo.css" rel="stylesheet">
	</head>
	<body>
		<div class="contenedor">
			<div class="membrete">
				<img title="Gobierno Bolivariano de Venezuela" src="imagen/gobierno.jpg" width="800px" height="78px"><br>	
				<img title="Logo de Sistema" src="imagen/logo.jpg" width="100px" height="100px" align="left">
				<img title="Instituto Universitario Tecnol&oacute;gico de Ejido" src="imagen/uptm.jpg" width="90px" height="100px" align="right" > 
				<h1> Sistema automatizado registro equipos de computacion y audiovisuales "SARECA"</h1>
			</div>
			<FORM  name='form1'  method='post' action='php/sesion/inicia_sesion.php'>
				<table class="tabla">
					<tr>
						<th colspan="2"><h2>Iniciar Sesión</h2></th>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<?php
								if(isset($_GET['e']) && $_GET['e'] == 1) echo 'Error en los datos suministrados';
								if(isset($_GET['e']) && $_GET['e'] == 2) echo 'Debe introducir los datos de un usuario valido para ingresar en el sistema';
							?>
						</td>
					</tr>
					<tr>
						<td><label for="usuario"><div align="right">Usuario<span class="red">*</span></div></label></td>
						<td><input name="usuario" id="usuario" type="text"style="text-align: center" placeholder="ID Usuario" size="21" title="Debe ingresar el identificador de usuario" required /><td>
					</tr>
					<tr>
						<td><label for="pass"><div align="right">Contraseña<span class="red">*</span></div></label></td>
						<td><input name="pass" id="pass" type="password" style="text-align: center" placeholder="Contraseña" size="21" title="Debe ingresar la contraseña de usuario" required /><td>
					</tr>
					<td colspan="2" align="center">
						<input type="submit" value='Entrar' id="boton" title="Click para iniciar sesión" />
						<input type="reset" value='Restablecer' id="boton" title="Limpia los Datos Introducidos" />
					</td>
				</table>
			</form>
		</div>
	</body>
</html>