$(buscarDatosTarjetasGraficas());

//funcion para buscar datos
function buscarDatosTarjetasGraficas(consulta){
	$.ajax({
		url: './admin/buscarTarjetasGraficas.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosTarjetasGraficas").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_TarjetasGraficas', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosTarjetasGraficas(valor);
	}else{
		buscarDatosTarjetasGraficas();
	}
});