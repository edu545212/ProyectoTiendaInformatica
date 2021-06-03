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
    var Chipset = getFilterData('Chipset');
    var Forma = getFilterData('Forma');
	$.ajax({
		url:"actionPlacasBases.php",
		method:"POST",
		dataType: "json",		
		data:{action:action, Marca:Marca, Chipset:Chipset, Forma:Forma},
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