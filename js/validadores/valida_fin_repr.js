function radio(){
	if(!valida_radio("resultado", "Debe elegir el resultado del proceso de reparación")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("boton").onclick = radio;
}