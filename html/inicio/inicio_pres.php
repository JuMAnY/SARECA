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
?>
<table class="tabla">
	<?php
		if ($res->num_rows == 0) {
	?>
			<tr>
				<td align="center">
					<table class="tab_con">
						<tr class="tr_con">
							<th class="th_con">Carnet</th>
							<th class="th_con">Nombre</th>
							<th class="th_con">Serial</th>
							<th class="th_con">Tipo</th>
							<th class="th_con">Fecha Prestamo</th>
						</tr>
						<tr class="tr_con">
							<td class="td_con" colspan="5"><h2>No existen equipos prestados.</h2></td>
						</tr>
					</tabla>
				</td>
			</tr>
	<?php	
		}else{
	?>
			<tr>
				<th><h2>Equipos Prestados</h2></th>
			</tr>
			<tr>
				<td align="center">
					<table class="tab_con">
						<tr class="tr_con">
							<th class="th_con">Carnet</th>
							<th class="th_con">Nombre</th>
							<th class="th_con">Serial</th>
							<th class="th_con">Tipo</th>
							<th class="th_con">Fecha Prestamo</th>
						</tr>
						<?php
							while ($fila = $res->fetch_object()) {
								if ($fila->tipo == 1) $tipo = 'VideoBeam';
								else $tipo = 'Retroproyector';
								list($a,$m,$d) = explode('-',$fila->Fecha_prestamo);
								printf('
									<tr class="tr_con">
										<td class="td_con">%d</td>
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%d-%d-%d</td>
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
					</table>
				</td>
			</tr>
	<?php
		}
		$conectar->close();
	?>
</table>