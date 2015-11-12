<!-- INICIO DE LA BARRA DE NAVEGACION -->
<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">SARECA</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Inicio"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span></a></li>
				<?php if($_SESSION["nivel"] == 3 || $_SESSION["nivel"] == 1){ ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-wrench"></span> Reparación<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="equipo_danado_f.php">Registro Equipo Dañado</a></li>
									<li><a href="consulta_equipo_f.php">Reparación de Equipo</a></li>
									<li><a href="conslt_lista_eq_f.php">Consulta Equipos Dañados</a></li>
								</ul>
							</li>
				<?php 	}
						if($_SESSION["nivel"] == 2 || $_SESSION["nivel"] == 1){
				?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-facetime-video"></span> AudioVisuales<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="equipo_audiovisual_f.php">Registro Equipo AudioVisual</a></li>
									<li><a href="usuario_prestamo_f.php">Registrar Usuario Prestamo</a></li>
									<li class="divider"></li>
									<li><a href="prestamo_f.php">Registrar Prestamo</a></li>
									<li><a href="devolucion_f.php">Devolución</a></li>
								</ul>
							</li>
				<?php 
				 		}
				?>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span> Reportes<span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="#">En Construnción</a></li>
						<li><a href="#">En Construnción</a></li>
					</ul>
				</li>
				<?php 	
						if($_SESSION["nivel"] == 1){
				?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span> Sistema<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="../php/respaldo/respaldar_bd.php">Respaldar Datos</a></li>
									<li><a href="lista_respaldo_f.php">Restaurar Datos</a></li>
								</ul>
							</li>
				<?php 	} ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if($_SESSION["nivel"] == 1){ ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-cog"></span><span class="glyphicon glyphicon-user"></span> Gestionar Usuarios<span class="caret"></span></a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="reg_usuario_sistema_f.php">Registrar Usuario</a></li>
									<li><a href="elim_usuario_sis_f.php">Eliminar Usuario</a></li>
								</ul>
							</li>
				<?php } ?>
				<li data-toggle="tooltip" data-placement="left" title="" data-original-title="Perfil Usuario" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <?=$_SESSION['nombre']?><span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li><a href="cambio_pass_f.php"><span class="glyphicon glyphicon-lock"></span> Cambiar Contraseña</a></li>
						<li><a href="#" data-href="../php/sesion/cierra_sesion.php" data-toggle="modal" data-target="#confirm-action" data-msj="¿Realmente desea salir del sistema?"><span class="glyphicon glyphicon-log-out"></span> Cerrar Sesión</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>
<!-- FIN DE LA BARRA DE NAVEGACION -->


<!-- INICIO DEL MODAL PARA CONFIRMAR ACCIÓN -->
<div class="modal fade" id="confirm-action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Confirmar Acción</h4>
			</div>

			<div class="modal-body">
				<p class="debug-url"></p>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				<a class="btn btn-danger btn-ok">Aceptar</a>
			</div>
		</div>
	</div>
</div>
<!-- FIN DEL MODAL PARA CONFIRMAR ACCIÓN -->