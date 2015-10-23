<?php
	if (isset($_GET['a'])) {
		$archivo = $_GET['a'];
		$directorio = 'C:\xampp\htdocs\sareca\php\respaldo\archivo';
		$dir = $directorio.'\\'.$archivo;
	}else{
		$directorio = $_FILES['respaldo']['tmp_name'];
		$dir = $directorio;
	}
	$user = 'root';
	$password = '';
	$comando = "C:\\xampp\mysql\bin\mysql.exe  --user=$user --password=$password sareca < $dir";
	system($comando,$error);
	if($error){
		echo "<script type='text/javascript'>alert('No se ha podido restaurar los Datos de SARECA')</script>";
		echo "<script type='text/javascript'>window.location.href='../../html/lista_respaldo_f.php'</script>";
	}else{
	    echo "<script type='text/javascript'>alert('Se ha restaurado con exito los Datos de SARECA')</script>";
	    echo "<script type='text/javascript'>window.location.href='../../html/lista_respaldo_f.php'</script>";
	}
?>