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










			<?php
				include("menu/menu.php");
			?>

			<div class="container">
				<div class="row">
					<?php
						if($_SESSION['nivel'] == 3 || $_SESSION['nivel'] == 1) include('inicio/inicio_rep.php');
						if($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 1) include('inicio/inicio_pres.php');
					?>
				</div>
			</div>



			











		<footer>
			Todos los derechos reservados &copy 2015 <br>
			SARECA | <b>JuMAnY</b><br>
		</footer>
		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/config.js"></script>
		<script src="../js/validadores/funciones.js"></script>
	</body>
</html>