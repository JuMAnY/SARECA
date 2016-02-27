<?php
	date_default_timezone_set('America/Caracas');
    $user = 'root';
    $password = 'root';
    $nombre = 'respaldo_'.date('Y-m-d').'.sql';
    $directorio = 'C:\xampp\htdocs\sareca\php\respaldo\archivo';
    $dir = $directorio.'\\'.$nombre;
    $comando = "C:\\xampp\mysql\bin\mysqldump.exe  --user=$user --password=$password sareca > $dir";
    system($comando,$error);
    
    if ($error) {
        header('Location: ../../html/lista_respaldo_f.php?m=2&e=¡El sistema de respaldo arrojo error desconocido!');
        exit();
    } else {
        header('Location: ../../html/lista_respaldo_f.php?m=1&a=respaldaron');
        exit();
    }
?>