<?php require('../php/sesion/valida_sesion.php');?>
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
						<div class="col-lg-6 col-lg-offset-3">
							<div class="page-header">
								<h1><span class="glyphicon glyphicon-user"></span> Usuario</h1>
							</div>
							<div class="well bs-component">
								<form class="form-horizontal" method='post' action='../php/reg_usuario_sistema.php'>
									<fieldset>
										<legend><span class="glyphicon glyphicon-pencil"> Registro</legend>
										<div class="form-group">
											<label for="tipo" class="col-lg-2 control-label">Nivel</label>
											<div class="col-lg-10">
												<select name="nivel" class="form-control" id="nivel" title="Debe elegir el nivel de acceso par el usuario" required>
													<option></option>
													<option value="1">Administrador</option>
													<option value="3">Dep. Reparación</option>
													<option value="2">Dep. AudioVisuales</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<label for="user" class="col-lg-2 control-label">ID</label>
											<div class="col-lg-10">
												<input name="user" class="form-control" id="user" placeholder="ID Usuario" type="text" title="Debe ingresar el identificador de usuario" required>
											</div>
										</div>
										<div class="form-group">
											<label for="pass" class="col-lg-2 control-label">Contraseña</label>
											<div class="col-lg-10">
												<input name="pass" class="form-control" id="pass" placeholder="Contraseña" type="password" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Formato: al menos 1 letra mayúscula, al menos 1 letra minúscula, al menos un número o caracter especial, mínimo 6 caracteres." required>
											</div>
										</div>
										<div class="form-group">
											<label for="re_pass" class="col-lg-2 control-label">Repita</label>
											<div class="col-lg-10">
												<input name="re_pass" class="form-control" id="re_pass" placeholder="Contraseña" type="password" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Repita la contraseña que ingresó" required>
											</div>
										</div>
										<div class="form-group">
											<label for="nombre" class="col-lg-2 control-label">Nombre</label>
											<div class="col-lg-10">
												<input name="nombre" class="form-control" id="nombre" placeholder="Nombre y Apellido" type="text" required>
											</div>
										</div>
										<div class="form-group">
											<label for="correo" class="col-lg-2 control-label">Correo</label>
											<div class="col-lg-10">
												<input name="correo" class="form-control" id="correo" placeholder="Correo" type="email" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$" title="Debe cumplir el formato: ejemplo@ejemplo.com" required>
											</div>
										</div>
										<div class="form-group">
											<div class="col-lg-10 col-lg-offset-2">
												<button type="reset" class="btn btn-default">Cancelar</button>
												<button type="submit" class="btn btn-primary" id="enviar">Enviar</button>
											</div>
										</div>
									</fieldset>
								</form>
								<!-- Inicio del modal con alerta por contraseñas diferentes -->
								<div id="myModal" class="modal fade" role="dialog">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove-circle"></span></button>
												<h4 class="modal-title">Contraseña</h4>
											</div>
											<div class="modal-body">
												<div class="alert alert-dismissible alert-warning">
													<h4>¡Advertencia!</h4>
													<p>Las Contraseñas que ha ingresado no coinciden. Por favor verifiquelas.</p>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
											</div>
										</div>
									</div>
								</div>
								<!-- Fin del modal con alerta por contraseñas diferentes -->
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
		<script src="../js/validadores/valida_user_sis.js"></script>
	</body>
</html>