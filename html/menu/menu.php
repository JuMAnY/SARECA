<?php
	if($_SESSION["nivel"] == 1) $class = 'gen';
	else $class = 'ind';
?>
<div class="menu<?=' '.$class?>">
	<ul>
		<li class="nivel1"><a href="inicio.php" class="nivel1">Inicio</a></li>
		<?php if($_SESSION["nivel"] == 3 || $_SESSION["nivel"] == 1){ ?>
					<li class="nivel1"><a href="#" class="nivel1">Reparación</a>
						<ul>
							<li><a href="equipo_danado_f.php">Registro de equipos Da&ntilde;ado</a></li>
							<li><a href="consulta_equipo_f.php">Reparación de equipos</a></li>
							<li><a href="conslt_lista_eq_f.php">Consulta Equipos Dañados</a></li>
						</ul>
					</li>
		<?php 	}
				if($_SESSION["nivel"] == 2 || $_SESSION["nivel"] == 1){
		?>
					<li class="nivel1"><a href="#" class="nivel1">Pr&eacute;stamo </a>
						<ul>
							<li><a href="equipo_audiovisual_f.php">Registro de equipos audiovisuale</a></li>
							<li><a href="usuario_prestamo_f.php">Registrar Usuarios Prestamos</a></li>
							<li><a href="prestamo_f.php">Registrar pr&eacute;stamo</a></li>
							<li><a href="devolucion_f.php">Devoluci&oacute;n</a></li>
						</ul>
					</li>
		<?php 
		 		}
		?>
					<li class="nivel1"><a href="#" class="nivel1">Reportes</a>
						<ul>
							<li><a href="#">En Construcción</a></li>
							<li><a href="#">En Construcción</a></li>
							<li><a href="#">En Construcción</a></li>
							<li><a href="#">En Construcción</a></li>
						</ul>
					</li>
		<?php 	
				if($_SESSION["nivel"] == 1){
		?>
					<li class="nivel1"><a href="#" class="nivel1">Sistema</a>
						<ul>
							<li><a href="../php/respaldo/respaldar_bd.php">Respaldar Datos</a></li>
							<li><a href="lista_respaldo_f.php">Restaurar Datos</a></li>
						</ul>
					</li>
		<?php 	} ?>
					<li class="nivel1"><a href="#" class="nivel1">Perfil Usuario</a>
						<ul>
							<?php if($_SESSION["nivel"] == 1){ ?>
								<li><a href="reg_usuario_sistema_f.php">Registrar Usuario</a></li>
								<li><a href="elim_usuario_sis_f.php">Eliminar Usuarios</a></li>
							<?php } ?>
							<li><a href="cambio_pass_f.php">Cambiar Contraseña</a></li>
						</ul>
					</li>
		<li class="nivel1"><a href="#" class="nivel1" title="Cerrar sesión" OnClick="confir_accion('¿Realmente desea salir del sistema?','../php/sesion/cierra_sesion.php')">Cerrar</a></li>
	</ul>
</div>							
																					
						