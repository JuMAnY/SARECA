function radio(){
	if(!valida_radio("Nucleo", "Debe elegir un nucleo de procedencia")) return false;
}

window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("guardar").onclick = radio;
}