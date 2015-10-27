<?php
	require('conexion/conexion.php');

	$mes = $_POST['m'];
	$periodo_ini = $_POST['m'].'-01';
	$periodo_fin = $_POST['m'].'-'.date('t',strtotime($_POST['m']));

	$sql = "SELECT *
			FROM reparacion
			WHERE Fecha_entrada BETWEEN '$periodo_ini' AND '$periodo_fin'
			AND resultado = 2";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
	
	if ($res->num_rows == 0) {
?>
		<tr>
			<td align="center">
				<table class="tab_con">
					<caption>Equipos reparados</caption>
					<tr class="tr_con">
						<th class="th_con">Serial</th>
						<th class="th_con">Nucleo</th>
						<th class="th_con">Departamento</th>
						<th class="th_con">Falla</th>
						<th class="th_con">Observacion</th>
						<th class="th_con">Fecha Entrada</th>
					</tr>
					<tr class="tr_con">
						<td class="td_con" colspan="6"><h3>No resultaron equipos REPARADOS par el periodo consultado.</h3></td>
					</tr>
					<tr>
						<th class="resul" colspan="6">Cantidad de resultados: <?=$res->num_rows?></th>
					</tr>
				</table>
			</td>
		</tr>
<?php
	}else{
?>
		<tr>
			<td align="center">
				<table class="tab_con">
					<caption>Equipos reparados</caption>
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
					<tr>
						<th class="resul" colspan="6">Cantidad de resultados: <?=$res->num_rows?></th>
					</tr>
				</table>
			</td>
		</tr>
<?php
	}

	/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


	$sql = "SELECT *
			FROM reparacion
			WHERE Fecha_entrada BETWEEN '$periodo_ini' AND '$periodo_fin'
			AND resultado = 1";
	$res = $conectar->query($sql);
	
	if(!$res){
		echo "<h1>ERROR</H1>";
		$conectar->close();
		exit();
	}
	
	if ($res->num_rows == 0) {
?>
		<br />
		<br />
		<tr>
			<td align="center">
				<table class="tab_con">
					<caption>Equipos no reparados</caption>
					<tr class="tr_con">
						<th class="th_con">Serial</th>
						<th class="th_con">Nucleo</th>
						<th class="th_con">Departamento</th>
						<th class="th_con">Falla</th>
						<th class="th_con">Observacion</th>
						<th class="th_con">Fecha Entrada</th>
					</tr>
					<tr class="tr_con">
						<td class="td_con" colspan="6"><h3>No resultaron equipos NO REPARADOS par el periodo consultado.</h3></td>
					</tr>
					<tr>
						<th class="resul" colspan="6">Cantidad de resultados: <?=$res->num_rows?></th>
					</tr>
				</table>
			</td>
		</tr>
<?php
	}else{
?>
		<br />
		<br />
		<tr>
			<td align="center">
				<table class="tab_con">
					<caption>Equipos no reparados</caption>
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
					<tr>
						<th class="resul" colspan="6">Cantidad de resultados: <?=$res->num_rows?></th>
					</tr>
				</table>
			</td>
		</tr>
<?php
	}
	$conectar->close();
?>