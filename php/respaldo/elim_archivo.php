<?php
	$archivo=$_GET['a'];
    $directorio='C:\xampp\htdocs\sareca\php\respaldo\archivo';
	$ruta=$directorio.'\\'.$archivo;
	$resultado=unlink($ruta);
    if(!$resultado){
		echo "<script type='text/javascript'>alert('No se ha podido Eliminar el archivo de respaldo')</script>";
		echo "<script type='text/javascript'>window.location.href='../../html/lista_respaldo_f.php'</script>";
	}else{
		echo "<script type='text/javascript'>alert('El archivo de respaldo ha sido eliminado con exito')</script>";
		echo "<script type='text/javascript'>window.location.href='../../html/lista_respaldo_f.php'</script>";
	}
    
    if (!$resultado) {
        header('Location: ../../html/lista_respaldo_f.php?m=2&e=¡El sistema de eliminación arrojo error desconocido!');
        exit();
    } else {
        header('Location: ../../html/lista_respaldo_f.php?m=1&a=eliminaron');
        exit();
    }
?>