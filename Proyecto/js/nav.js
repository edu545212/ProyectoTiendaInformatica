//funcion que oculta el navbar cuando se hace scroll hacia abajo y lo muestra cuando se hace scroll hacia arriba
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
     
var currentScrollpos = window.pageYOffset;
if(prevScrollpos > currentScrollpos) {
      //muestra el navbar
      document.getElementById("navbar").style.top = "0";
} else {
      //oculta el navbar
      document.getElementById("navbar").style.top = "-58px";
}

prevScrollpos = currentScrollpos;

}


$(document).ready(function() {
	
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	
});