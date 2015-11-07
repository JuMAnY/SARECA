function manejador_carga(){
	var mes = document.getElementById("mes").value;
	var variables = "m="+mes;
	carga_documento(mes,"carga_tabla","../php/lista_eq.php",variables);
}



window.onload = function(){
	document.getElementById("mes").onchange = manejador_carga;
}