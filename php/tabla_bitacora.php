<?php
require('conexion/conexion.php');

function conslt_bitacora_user($cnx_bd){
		
	$usuario = $_POST['u'];
	$m = $_POST['m'];
	$a = $_POST['a'];
	$ini = $a.'-'.$m.'-01';
	$fin = $a.'-'.$m.'-'.date('t',strtotime($ini));
	$sql = "SELECT * 
			FROM bitacora 
			WHERE id_usuario = '$usuario' 
			AND fecha 
			BETWEEN '$ini' 
			AND '$fin'";
		
	$resultado = $cnx_bd->query($sql);
	
	//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
	return $resultado;
}

function conslt_bitacora($cnx_bd){

	$m = $_POST['m'];
	$a = $_POST['a'];
	$ini = $a.'-'.$m.'-01';
	$fin = $a.'-'.$m.'-'.date('t',strtotime($ini));

	$sql = "SELECT * 
			FROM bitacora 
			WHERE fecha 
			BETWEEN '$ini' 
			AND '$fin'";
		
	$resultado = $cnx_bd->query($sql);
	
	//RETORNAMOS EL RESULTADO DE LA CONSULTA A LA BASE DE DATOS
	return $resultado;
}

// if ($_POST['u'] == 'todos')
// 	$res = conslt_bitacora($conectar);
// else
// 	$res = conslt_bitacora_user($conectar);

$res = ($_POST['u'] == 'todos') ? conslt_bitacora($conectar) : conslt_bitacora_user($conectar);

$conectar->close();
	
if(!$res){
	echo "<h1>ERROR</H1>";
	$conectar->close();
	exit();
}

if ($res->num_rows == 0) {

?>
		<div class="row">
			<div class="col-lg-12">
				<div class="alert alert-dismissible alert-info">
					<strong>No existen resultados para su consulta.</strong>
				</div>
			</div>
		</div>
<?php

} else {

?>
		<div class="row">
			<div class="col-lg-12">
				<table id="" class="table table-striped table-hover consulta">
					<thead>
						<tr>
							<th>Que Hizo?</th>
							<th>Donde lo Hizo?</th>
							<th>Quien lo Hizo?</th>
							<th>Cuando lo Hizo?</th>
						</tr>
					</thead>
					<tbody>
					<?php
					while ($fila = $res->fetch_object()) {
						$sql = array();
						$sql = explode(" ",$fila->sentencia);
						$num_palab = count($sql);
						for($i = 0; $i < $num_palab; $i++) {
							switch($sql[$i]) {
								case 'INSERT':
									$accion = 'Registrar';
									break;
								case 'UPDATE':
									$accion = 'Modificar';
									break;
								case 'SELECT':
									$accion = 'Seleccionar';
									break;
								case 'DELETE':
									$accion = 'Eliminar';
									break;
								case 'equipo_audiovisual':
									$tabla = 'Equipo audiovisual';
									break;
								case 'persona':
									$tabla = 'Persona';
									break;
								case 'prestamo':
									$tabla = 'Prestamo';
									break;
								case 'reparacion':
									$tabla = 'Reparación';
									break;
								case 'usuario':
									$tabla = 'Usuario';
									if($accion == 'Seleccionar') {
										for($j = 0; $j < $num_palab; $j++) {
											if($sql[$j] == "Contrasena,") {
												$accion = 'Ingresar';
												$tabla = 'SARECA';
											}
										}
									}
									break;
							}
						}
						list($fch,$hr) = explode(' ',$fila->fecha);
						list($a,$m,$d) = explode('-',$fch);
						list($h,$min,$seg) = explode(':',$hr);
						if($h == 0) {
							$h = 12;
							$format = 'AM';
						}elseif($h > 12) {
							$h -= 12;
							$format = 'PM';
						}elseif($h == 12) $format = 'PM';
						else $format = 'AM';
						?>
						<tr>
							<td><?=$accion?></td>
							<td><?=$tabla?></td>
							<td><?=$fila->nombre?></td>
							<td><?=$d.'-'.$m.'-'.$a.' '.$h.':'.$min.':'.$seg.' '.$format?></td>
						</tr>
				<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
<?php
	}
?>