function radio(){
	if(!valida_radio("tipo", "Debe elegir un tipo de equipo Audiovisual")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("boton").onclick = radio;
}