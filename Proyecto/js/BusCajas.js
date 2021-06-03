$(buscarDatosCajas());

//funcion para buscar datos
function buscarDatosCajas(consulta){
	$.ajax({
		url: './admin/buscarCajas.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosCajas").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_Cajas', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosCajas(valor);
	}else{
		buscarDatosCajas();
	}
});