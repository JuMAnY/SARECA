<?php

require('conexion/conexion.php');

// ++++++++++++++++++++++ GENERA CONTRASEÑA ALEATORIA ++++++++++++++++++++++++++++++++++++
function generaPass()
{
    //Se definen las cadenas de cada tipo de caracter que conformaran el pass.
    $minuscula = "abcdefghijklmnopqrstuvwxyz";
    $mayuscula = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $numero = "1234567890";
    $simbolo = "-*$#_";
    //Obtenemos la longitud de cada cadena
    $longitud_minuscula = strlen($minuscula);
    $longitud_mayuscula = strlen($mayuscula);
    $longitud_numero = strlen($numero);
    $longitud_simbolo = strlen($simbolo);
     
    //Se define la variable que va a contener la contraseña
    $pass = "";
    //Se define la longitud de la contraseña
    $longitudPass = 6;

    //Creamos la contraseña
    for ($i = 1 ; $i <= $longitudPass ; $i++) {
    	// Evaluamos la posicion de la iteracion para ir determinando el caracter a agregar
        if ($i == 1 || $i == 2) {
        	//Definimos numero aleatorio entre 0 y la longitud de la cadena
	        $pos = rand(0,$longitud_minuscula-1);
			// Se forma la contraseña en cada iteraccion, añadiendo a $pass la letra de la posicion $pos.
	        $pass .= substr($minuscula,$pos,1);
        }
    	// Evaluamos la posicion de la iteracion para ir determinando el caracter a agregar
        if ($i == 3 || $i == 4) {
        	//Definimos numero aleatorio entre 0 y la longitud de la cadena
	        $pos = rand(0,$longitud_mayuscula-1);
	     	// Se forma la contraseña en cada iteraccion, añadiendo a $pass la letra de la posicion $pos.
	        $pass .= substr($mayuscula,$pos,1);
        }
    	// Evaluamos la posicion de la iteracion para ir determinando el caracter a agregar
        if ($i == 5) {
        	//Definimos numero aleatorio entre 0 y la longitud de la cadena
	        $pos = rand(0,$longitud_numero-1);
	     	// Se forma la contraseña en cada iteraccion, añadiendo a $pass la letra de la posicion $pos.
	        $pass .= substr($numero,$pos,1);
        }
    	// Evaluamos la posicion de la iteracion para ir determinando el caracter a agregar
        if ($i == 6) {
        	//Definimos numero aleatorio entre 0 y la longitud de la cadena
	        $pos = rand(0,$longitud_simbolo-1);
	     	// Se forma la contraseña en cada iteraccion, añadiendo a $pass la letra de la posicion $pos.
	        $pass .= substr($simbolo,$pos,1);
        }
    }

    // Ordena la cadena ($pass) de forma aleatoria
    $pass = str_shuffle($pass);

    // Devuelve la contraseña ya generada
    return $pass;
}

function enviarEmail($email, $password)
{
	$mensaje = '<html>
		<head>
			<title>Reinicio de contraseña</title>
		</head>
		<body>
			<p>Hemos recibido una petición para el reinicio de la contraseña de tu cuenta.</p>
			<p>Te hemos enviado una contraseña nueva. Por favor, al ingresar a SARECA, configure una nueva contraseña.</p>
			<p><strong>Contraseña: ' . $password . '</strong></p>
		</body>
	</html>';

	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$cabeceras .= 'From: SARECA <mimail@codedrinks.com>' . "\r\n";

	$submit = mail($email, 'Reiniciar contraseña', $mensaje, $cabeceras);

	return $submit;
}

$id_usuario = $_POST['usuario-modal'];

if ($id_usuario != "") {
	
	$sql = "SELECT correo FROM usuario WHERE Id = '$id_usuario' ";
	$res = $conectar->query($sql);

	if ($res->num_rows > 0) {

		$usuario = $res->fetch_object();

		$password = generaPass();
		$encrypt_pass = md5($password);

		$sql = "UPDATE usuario SET Contrasena = '$encrypt_pass' WHERE Id = '$id_usuario'";
		$conectar->query($sql);

		if ($conectar->affected_rows > 0) {
			$submit = enviarEmail($usuario->correo, $password);
			if ($submit) {
				$mensaje = '
				<div class="alert alert-dismissible alert-info fadeInUp animated">
					<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
					<strong>Un correo ha sido enviado a su cuenta de correo electronico con una nueva contraseña.</strong>'.$password.'
				</div>';
			} else {
				$mensaje = '
				<div class="alert alert-dismissible alert-warning fadeInUp animated">
					<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
					<strong>No fue posible enviar el correo electronico con la nueva contraseña, por favor contacte al administrador del sistema.</strong>
				</div>';
			}
		} else {
			$mensaje = '
			<div class="alert alert-dismissible alert-warning fadeInUp animated">
				<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
				<strong>No fue posible reiniciar la contraseña, por favor contacte al administrador del sistema.</strong>
			</div>';
		}
	} else {
		$mensaje = '
		<div class="alert alert-dismissible alert-warning fadeInUp animated">
			<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
			<strong>No existe ningún usuario registrado con el identificador ingresado.</strong>
		</div>';
	}
} else {
	$mensaje = '
	<div class="alert alert-dismissible alert-warning fadeInUp animated">
		<button type="button" class="close" data-dismiss="alert"><span class="glyphicon glyphicon-remove-circle"></span></button>
		<strong>Debes introducir el identificador de usuario con el que estas registrado.</strong>
	</div>';
}

echo json_encode($mensaje);