$(buscarDatosPlacasBases());

//funcion para buscar datos
function buscarDatosPlacasBases(consulta){
	$.ajax({
		url: './admin/buscarPlacasBases.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosPlacasBases").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_PlacasBases', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosPlacasBases(valor);
	}else{
		buscarDatosPlacasBases();
	}
});