function elim_resp(nombre){
	var mensaje = '¿Esta seguro que desea eliminar el archivo: '+nombre+'?';
	var archivo = '../php/respaldo/elim_archivo.php?a='+nombre;
	if(!confir_accion(mensaje,archivo)) return false;
}