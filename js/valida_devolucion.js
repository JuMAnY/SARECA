function radio(){
	if(!valida_radio("serial", "Debe elegir el equipo devuelto")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("devolver").onclick = radio;
}