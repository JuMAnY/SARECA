<?php
	date_default_timezone_set('America/Caracas');
    $user = 'root';
    $password = '';
    $nombre = 'respaldo_'.date('Y-m-d').'.sql';
    $directorio = 'C:\xampp\htdocs\sareca\php\respaldo\archivo';
    $dir = $directorio.'\\'.$nombre;
    $comando = "C:\\xampp\mysql\bin\mysqldump.exe  --user=$user --password=$password sareca > $dir";
    system($comando,$error);
    if($error){
        echo "<script type='text/javascript'>alert('No se ha podido respaldar los datos de SARECA')</script>";
        echo "<script type='text/javascript'>window.location.href='../../html/inicio.php'</script>";
    }else{
        echo "<script type='text/javascript'>alert('Respaldo exitoso de los Datos de SARECA')</script>";
        echo "<script type='text/javascript'>window.location.href='../../html/inicio.php'</script>";
    }
?>