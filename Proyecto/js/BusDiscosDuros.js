$(buscarDatosDiscosDuros());

function buscarDatosDiscosDuros(consulta){
	$.ajax({
		url: './admin/buscarDiscosDuros.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosDiscosDuros").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_DiscosDuros', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosDiscosDuros(valor);
	}else{
		buscarDatosDiscosDuros();
	}
});