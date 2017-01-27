function paginacion_tabla() {
	$('table.consulta').DataTable( {
     	"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "Todos"]],
        "language": {
             "sProcessing":     "Procesando...",
 			"sLengthMenu":     "Mostrar _MENU_ registros",
 			"sZeroRecords":    "No se encontraron resultados",
 			"sEmptyTable":     "Ninún dato disponible en esta tabla",
 			"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
 			"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
 			"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
 			"sInfoPostFix":    "",
 			"sSearch":         "Buscar:",
 			"sUrl":            "",
 			"sInfoThousands":  ",",
 			"sLoadingRecords": "Cargando...",
 			"oPaginate": {
 				"sFirst":    "Primero",
 				"sLast":     "Último",
 				"sNext":     ">>",
 				"sPrevious": "<<"
 			},
 			"oAria": {
 				"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
 				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
 			}
        }
    } );
}

// function carga_documento2(campo, div, doc, variables){
// 	alert("Entra6.1");
//     if(campo == '') {
//     	alert("Entra6.1.1");
//         $("#" + div).html("");
//         return false;
//     }
//     alert("Entra6.2");
//     $.ajax({
//         url: doc,
//         data: variables,
//         type: "POST",
//         success: function (responseText) {
//         	alert("Entra6.3.1");
//             $(div).html(responseText);
//             alert("Entra6.3.2");
//             paginacion_tabla();
//             alert("Entra6.3.3");
//         }
//     });
//     alert("Entra6.4");
// }

function manejador_carga(){
	var user = document.getElementById("u").value;
	var mes = document.getElementById("mes");
	var ano = document.getElementById("ano");
	if (mes.value == "") {
		mes.selectedIndex = 0;
		var campo = mes.value;
	}
	if (ano.value == "") {
		ano.selectedIndex = 0;
		var campo = ano.value;
	}
	var variables = "u="+user+"&m="+mes.value+"&a="+ano.value;
	carga_documento(campo,"carga","../php/tabla_bitacora.php",variables);
}



window.onload = function(){
	document.forms[0].reset;
	document.forms[0].elements[0].focus();
	document.getElementById("u").onchange = manejador_carga;
	document.getElementById("mes").onchange = manejador_carga;
	document.getElementById("ano").onchange = manejador_carga;
}