/*****************************************************************************************************************************/
function valida_radio(name,mensaje){	
	opciones = document.getElementsByName(name);
	var seleccionado = false;
	for(var i=0; i<opciones.length; i++) {    
		if(opciones[i].checked) {
			seleccionado = true;
			break;
		}
	}

	if(!seleccionado) {
		alert(mensaje);
		return false;
	}else return true;
}


/*****************************************************************************************************************************/
function confir_accion(mensaje,archivo){
	if(confirm(mensaje)) window.location.href=archivo;
}


/*****************************************************************************************************************************/
function compara_campos(id1,id2,mensaje){
	var campo1 = document.getElementById(id1).value;
	var campo2 = document.getElementById(id2).value;
	if (campo1 != campo2) {
		alert(mensaje);
		return false;
	}else return true;
}


/*****************************************************************************************************************************/
function carga_documento(campo,div,doc,variables){
	if(campo==''){
		document.getElementById(div).innerHTML="";
		return;
	}
	var xmlhttp;
	if (window.XMLHttpRequest){
		//para IE7+, Firefox, Chrome, Opera, Safari
		var xmlhttp=new XMLHttpRequest();
	}else{
		//para IE6, IE5
		var xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function(){
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			document.getElementById(div).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("POST",doc,true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(variables);
}

