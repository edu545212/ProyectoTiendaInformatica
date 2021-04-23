function SeleccionarPanel(evt, Panel) {
  // Declarar variables
  var i, tabcontent, tablinks;

  // Obtener todos los elementos="tabcontent" y ocultrarlos
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Obtener todos los elementos "tablinks" y quitar la clase active
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Muestra la pestaña actual y agrega una clase "active" al botón que abrió la pestaña
  document.getElementById(Panel).style.display = "block";
  evt.currentTarget.className += " active";
}

function ConfirmarEliminar(){
  let respuesta = confirm("Estas seguro que deseas eliminar el campo");
  if(respuesta == true){
    return true;
  }else{
    return false;
  }
}

