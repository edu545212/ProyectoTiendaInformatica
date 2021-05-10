$(buscarDatosProcesador());

function buscarDatosProcesador(consulta){
	$.ajax({
		url: './admin/buscarProcesador.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosProcesador").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_Procesador', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosProcesador(valor);
	}else{
		buscarDatosProcesador();
	}
});