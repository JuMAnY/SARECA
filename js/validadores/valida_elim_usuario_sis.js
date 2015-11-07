function elim_user(nombre,user){
	var mensaje = '¿Esta seguro que desea eliminar a el usuario: '+nombre+'?';
	var archivo = '../php/elim_usuario_sis.php?u='+user;
	if(!confir_accion(mensaje,archivo)) return false;
}