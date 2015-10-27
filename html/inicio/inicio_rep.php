<?php
	require('../php/conexion/conexion.php');
	
	$sql = "SELECT * FROM reparacion WHERE Estado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
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
							<th class="th_con">Serial</th>
							<th class="th_con">Nucleo</th>
							<th class="th_con">Departamento</th>
							<th class="th_con">Falla</th>
							<th class="th_con">Observacion</th>
							<th class="th_con">Fecha Entrada</th>
						</tr>
						<tr class="tr_con">
							<td class="td_con" colspan="6"><h2>No existen equipos en reparación.</h2></td>
						</tr>
					</table>
				</td>
			</tr>
	<?php
		}else{
	?>
			<tr>
				<th><h2>Equipos en Reparación</h2></th>
			</tr>
			<tr>
				<td align="center">
					<table class="tab_con">
						<tr class="tr_con">
							<th class="th_con">Serial</th>
							<th class="th_con">Nucleo</th>
							<th class="th_con">Departamento</th>
							<th class="th_con">Falla</th>
							<th class="th_con">Observacion</th>
							<th class="th_con">Fecha Entrada</th>
						</tr>
						<?php
							while ($fila = $res->fetch_object()) {
								list($a,$m,$d) = explode('-',$fila->Fecha_entrada);
								printf('
									<tr class="tr_con">
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%s</td>
										<td class="td_con">%d-%d-%d</td>
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
					</table>
				</td>
			</tr>
	<?php
		}
		$conectar->close();
	?>
</table>
<br />