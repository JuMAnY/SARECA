<?php
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT * FROM reparacion WHERE Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}

	if ($res->num_rows == 0) {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-wrench"></span> Equipos en Reparación</h3>
				<div class="alert alert-dismissible alert-info">
					<strong>No hay equipos en reparación.</strong>
				</div>
			</div>
		</div>
<?php
	} else {
?>
		<div class="row">
			<div class="col-lg-12">
				<h3><span class="glyphicon glyphicon-wrench"></span> Equipos en Reparación</h3>
				<table id="" class="table table-striped table-hover pendientes">
					<thead>
						<tr>
							<th>Serial</th>
							<th>Nucleo</th>
							<th>Departamento</th>
							<th>Falla</th>
							<th>Observacion</th>
							<th>Fecha Entrada</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($fila = $res->fetch_object()) {
							list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
							printf('
								<tr>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%s</td>
									<td>%d-%d-%d</td>
								</tr>',
								$fila->Serial_equipo,
								$fila->Nucleo,
								$fila->Departamento,
								$fila->falla,
								$fila->observacion,
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