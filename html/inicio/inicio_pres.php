<?php
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT *
			FROM equipo_audiovisual
			JOIN prestamo ON equipo_audiovisual.Serial = prestamo.Serial_equipo
			JOIN persona ON prestamo.Carnet = persona.Carnet
			WHERE equipo_audiovisual.Estado = 2
			AND prestamo.Estado = 2";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</h1>";
		$conectar->close();
		exit();
	}

	if ($res->num_rows == 0) {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-facetime-video"></span> Equipos Prestados</h3>
				<div class="alert alert-dismissible alert-info">
					<strong>No hay equipos AudioVisuales en préstamo.</strong>
				</div>
			</div>
		</div>
<?php	
	} else {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-facetime-video"></span> Equipos Prestados</h3>
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Carnet</th>
							<th>Nombre</th>
							<th>Serial</th>
							<th>Tipo</th>
							<th>Fecha Prestamo</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($fila = $res->fetch_object()) {
							if ($fila->tipo == 1) $tipo = 'VideoBeam';
							else $tipo = 'Retroproyector';
							list($a,$m,$d) = explode('-',$fila->Fecha_prestamo);
							printf('
								<tr class="tr_con">
									<td>%d</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%d-%d-%d</td>
								</tr>',
								$fila->Carnet,
								$fila->Nombre,
								$fila->Serial_equipo,
								$tipo,
								$d,
								$m,
								$a
							);
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

<?php
	}
	$conectar->close();
?>