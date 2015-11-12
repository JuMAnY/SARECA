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
		<div id="wrap">

			<?php
				include("menu/menu.php");
			?>
			
			<!-- contendor de la pagina -->
			<div class="container">
				<div class="bs-docs-section">
					<div class="page-header">
						<h1><span class="glyphicon glyphicon-alert"></span> Pendientes</h1>
					</div>
					<div class="jumbotron">
						<?php
							if ($_SESSION['nivel'] == 3 || $_SESSION['nivel'] == 1) include('inicio/inicio_rep.php');
							echo '<br>';
							if ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 1) include('inicio/inicio_pres.php');
						?>
					</div>
				</div>
			</div>
			<div id="push"></div>
		</div>

		<div id="footer">
			<div class="container">
				<p class="muted credit">
					Todos los derechos reservados &copy 2015 <br>
					SARECA | <b>JuMAnY</b>
				</p>
			</div>
		</div>

		<script src="../js/jquery-1.11.3.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="../js/config.js"></script>
		<script src="../js/validadores/funciones.js"></script>
	</body>
</html>