$(buscarDatosMemoriasRAM());

//funcion para buscar datos
function buscarDatosMemoriasRAM(consulta){
	$.ajax({
		url: './admin/buscarMemoriasRAM.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: consulta},
	})
	.done(function(respuesta){
		$("#datosMemoriasRAM").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda_MemoriasRAM', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscarDatosMemoriasRAM(valor);
	}else{
		buscarDatosMemoriasRAM();
	}
});