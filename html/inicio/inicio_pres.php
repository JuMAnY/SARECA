<?php
	
	$sql = "SELECT *
			FROM equipo_audiovisual
			JOIN prestamo ON equipo_audiovisual.Serial = prestamo.Serial_equipo
			JOIN persona ON prestamo.Cedula = persona.Cedula
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
				<table id="" class="table table-striped table-hover pendientes">
					<thead>
						<tr>
							<th>Cédula</th>
							<th>Nombre</th>
							<th>Serial</th>
							<th>Tipo</th>
							<th>Fecha Prestamo</th>
							<th>Hora Estimada Devolución</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($fila = $res->fetch_object()) {
							$tipo = ($fila->tipo == 1) ? 'VideoBeam' : 'Retroproyector';
							list($a,$m,$d) = explode('-',$fila->Fecha_prestamo);
							list($hh,$mm,) = explode(':',$fila->hora_estimada_devolucion);
							$r = $hh - 12;
							if ($r > 0) {
								$hh = $r;
								$periodo_meridiano = 'p.m.';
							} elseif ($r == 0) {
								$periodo_meridiano = 'p.m.';
							} else {
								$periodo_meridiano = 'a.m.';
							}
							printf('
								<tr class="tr_con">
									<td>%d</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%d-%d-%d</td>
									<td>%s:%s %s</td>
								</tr>',
								$fila->Cedula,
								$fila->Nombre,
								$fila->Serial_equipo,
								$tipo,
								$d,
								$m,
								$a,
								$hh,
								$mm,
								$periodo_meridiano
							);
						}
						?>
					</tbody>
				</table>
			</div>
		</div>

<?php
	}
?>