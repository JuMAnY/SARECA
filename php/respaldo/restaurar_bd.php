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
	$password = 'root';
	$comando = "C:\\xampp\mysql\bin\mysql.exe  --user=$user --password=$password sareca < $dir";
	system($comando,$error);
    
    if ($error) {
        header('Location: ../../html/lista_respaldo_f.php?m=2&e=¡El sistema de restauración arrojo error desconocido!');
        exit();
    } else {
        header('Location: ../../html/lista_respaldo_f.php?m=1&a=restauraron');
        exit();
    }
?>