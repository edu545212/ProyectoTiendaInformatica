$(buscarDatosUsuario());

function buscarDatosUsuario(consulta){
	$.ajax({
		url: './admin/buscarUsuario.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosUsuario").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_Usuario', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosUsuario(valor);
	}else{
		buscarDatosUsuario();
	}
});