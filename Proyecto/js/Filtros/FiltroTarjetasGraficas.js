$(document).ready(function(){
    filterSearch();	
    $('.productDetail').click(function(){
        filterSearch();
    });	
});

function filterSearch() {
	$('.searchResult').html('<div id="loading">Cargando .....</div>');
	var action = 'fetch_data';
	var Marca = getFilterData('Marca');
	var Tipo = getFilterData('Tipo');
    var Memoria = getFilterData('Memoria');
	$.ajax({
		url:"actionTarjetasGraficas.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, Marca:Marca, Tipo:Tipo, Memoria:Memoria},
		success:function(data){
			$('.searchResult').html(data.html);
		}
	});
}
function getFilterData(className) {
	var filter = [];
	$('.'+className+':checked').each(function(){
		filter.push($(this).val());
	});
	return filter;
}