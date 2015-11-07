function camb_pass(){
	if(!compara_campos("pass","re_pass","La contraseña no coincide, por favor verifique")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("cambiar").onclick = camb_pass;
}