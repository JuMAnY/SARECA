$(function(){
	$('#cedula').keyup(function(){
		if ($('#cedula').val() == "" || $('#cedula').val().length == 0) {
			$('.lista_prestador').html("");
		} else {
			var search = $(this).val();
			$.post('../php/busqueda_datalist_prestador.php',{variable:search},function(r){
				$('.lista_prestador').html(r);
			});
		};
	});

	$('.lista_prestador').delegate('li','click',function(){
		var texto = $(this).text(); 
		if (texto == 'Esta cédula no esta registrada') {
			texto = '';
		}
		$('#cedula').val(texto);
		$('.lista_prestador').html("");
	});
});