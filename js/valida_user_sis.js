function valida_reg(){
	if(!valida_radio("nivel", "Debe elegir un nivel para el nuevo usuario")) return false;
	if(!compara_campos("pass","re_pass","La contraseña no coincide, por favor verifique")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("guardar").onclick = valida_reg;
}