$(document).ready(function() {
    $("#modal-form").submit(function(event) {
		event.preventDefault();
		$.ajax( {
			url:'php/reset_pass.php',
			type:'post',
			dataType:'json',
			data:$("#modal-form").serializeArray()
		} ).done(function(mensaje) {
			$("#mensaje").html(mensaje);
			$("#usuario-modal").val('');
		} );
	} );
} );