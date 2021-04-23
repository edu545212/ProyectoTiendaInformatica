//consntante que obtiene los datos
const usuario = document.getElementById("usuario");
const password = document.getElementById("password");
const password2 = document.getElementById("password2");
const email = document.getElementById("email");
const DNi = document.getElementById("DNi");
const telefono = document.getElementById("telefono")
const CP = document.getElementById("CP");
const nombre = document.getElementById("nombre");
const apellido1 = document.getElementById("apellido1")
const apellido2 = document.getElementById("apellido2");

//constantes que optiene los errores
const errorUsuario = $('#errorUsuario');
const errorPassword = $('#errorPassword');
const errorPassword2 = $('#errorPassword2');
const errorEmail = $('#errorEmail');
const errorDNi = $('#errorDNi');
const errorFormulario = $('#errorFormulario');
const errorTelefono = $('#errorTelefono');
const errorCodigoPostal = $('#errorCodigoPostal');
const errorNombre = $('#errorNombre');
const errorApellido1 = $('#errorApellido1');
const errorApellido2 = $('#errorApellido2');

//ocultar errores por defecto
errorUsuario.hide();
errorPassword.hide();
errorPassword2.hide();
errorEmail.hide();
errorDNi.hide();
errorFormulario.hide();
errorTelefono.hide();
errorCodigoPostal.hide();
errorNombre.hide();
errorApellido1.hide();
errorApellido2.hide();

//constante que almacena las expresiones regulares
const expresiones ={
	usuario: /^[a-zA-ZÁ-Źá-ź0-9\_\-]{6,45}$/,
    password: /^(?=.*\d)(?=.*[\u0021-\u002f\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,45}$/,
	nombre: /^[a-zA-ZÁ-Źá-ź]+$/,
	apellido: /^[a-zA-ZÁ-Źá-ź]+$/,
    email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
    dni: /^\d{8}[A-Z]$/,
	telefono:  /^\d{9}$/,
	CP: /^(?:0[1-9]|[1-4]\d|5[0-2])\d{3}$/
}

//constante que establece los campos en false para no poder enviar el formulario
const campos = {
	usuario: false,
	password: false,
	email: false,
	nombre: false,
	apellido1: false,
	apellido2: false,
	dni: false,
	telefono: false,
	CP: false
}

//funcion que valida el usuario, establece la primera letra en mayusculas y establece la constante campos.usuario en true
//si es valido
function validarUsuario(){
	usuario.value = usuario.value.charAt(0).toUpperCase() + usuario.value.slice(1);
	if (expresiones.usuario.test(usuario.value)){
		usuario.className = "form-control is-valid";
		errorUsuario.hide();
		errorFormulario.hide();
		campos['usuario'] = true;
	} else {
		usuario.className = "form-control is-invalid";
		errorUsuario.show();
		campos['usuario'] = false;
	}
}

//funcion que se encarga de validar la contraseña y si esta es correcta se establece campos.password en true
//por seguridad tambien se llama a password2 por si ha introducido las contraseñas en el orden al reves
function validarPassword(){
	if (expresiones.password.test(password.value)){
		password.className = "form-control is-valid";
		errorPassword.hide();
		errorFormulario.hide();
		campos['password'] = true;
        validarPassword2();
	} else {
		password.className = "form-control is-invalid";
		errorPassword.show();
		campos['password'] = false;
        validarPassword2();
	}
}

//funcion que comprueba si ambas contraseñas son iguales
function validarPassword2(){
	if (password.value == password2.value){
		password2.className = "form-control is-valid";
		errorPassword2.hide();
		errorFormulario.hide();
		campos['password'] = true;
	} else {
		password2.className = "form-control is-invalid";
		errorPassword2.show();
		campos['password'] = false;
	}
}

//funcion que valida el emai y establece la constante campos.email en true
//si es valido
function validarEmail(){
	if (expresiones.email.test(email.value)){
		email.className = "form-control is-valid";
		errorEmail.hide();
		errorFormulario.hide();
		campos['email'] = true;
	} else {
		email.className = "form-control is-invalid";
		errorEmail.show();
		campos['email'] = false;
	}
}

//funcion que valida el nombre y establece la constante campos.nombre en true
//si es valido
function validarNombre(){
	if (expresiones.nombre.test(nombre.value)){
		nombre.className = "form-control is-valid";
		errorNombre.hide();
		errorFormulario.hide();
		campos['nombre'] = true;
	} else {
		nombre.className = "form-control is-invalid";
		errorNombre.show();
		campos['nombre'] = false;
	}
}

//funcion que valida el apellido1 y establece la constante campos.apellido1 en true
//si es valido
function validarApellido1(){
	if (expresiones.apellido.test(apellido1.value)){
		apellido1.className = "form-control is-valid";
		errorApellido1.hide();
		errorFormulario.hide();
		campos['apellido1'] = true;
	} else {
		apellido1.className = "form-control is-invalid";
		errorApellido1.show();
		campos['apellido1'] = false;
	}
}

//funcion que valida el apellido2 y establece la constante campos.apellido2 en true
//si es valido
function validarApellido2(){
	if (expresiones.apellido.test(apellido2.value)){
		apellido2.className = "form-control is-valid";
		errorApellido2.hide();
		errorFormulario.hide();
		campos['apellido2'] = true;
	} else {
		apellido2.className = "form-control is-invalid";
		errorApellido2.show();
		campos['apellido2'] = false;
	}
}



//funcion que valida el telefono y establece la constante campos.telefono en true
//si es valido
function validarTelefono(){
	if (expresiones.telefono.test(telefono.value)){
		telefono.className = "form-control is-valid";
		errorTelefono.hide();
		errorFormulario.hide();
		campos['telefono'] = true;
	} else {
		telefono.className = "form-control is-invalid";
		errorTelefono.show();
		campos['telefono'] = false;
	}
}

//funcion que valida el codigo postal y establece la constante campos.CP en true
//si es valido
function validarCP(){
	if (expresiones.CP.test(CP.value)){
		CP.className = "form-control is-valid";
		errorCodigoPostal.hide();
		errorFormulario.hide();
		campos['CP'] = true;
	} else {
		CP.className = "form-control is-invalid";
		errorCodigoPostal.show();
		campos['CP'] = false;
	}
}

//funcion que valida el dni y establece la letra por defecto en mayuscula
function validarDNi() {

	var numero
	var letr
	var letra
	DNi.value = DNi.value.slice(0,8) + DNi.value.charAt(8).toUpperCase();
	if(expresiones.dni.test(DNi.value)){
	   numero = DNi.value.substr(0,DNi.value.length-1);
	   letr = DNi.value.substr(DNi.value.length-1,1);
	   numero = numero % 23;
	   letra='TRWAGMYFPDXBNJZSQVHLCKET';
	   letra=letra.substring(numero,numero+1);
	  if (letra!=letr.toUpperCase()) {
		DNi.className = "form-control is-invalid";
		errorDNi.show();
		campos['dni'] = false;
	   }else{
		DNi.className = "form-control is-valid";
		errorDNi.hide();
		errorFormulario.hide();
		campos['dni'] = true;
	   }
	}else{
		DNi.className = "form-control is-invalid";
		errorDNi.show();
		campos['dni'] = false;
	}
}

//funcion que se usa al darle al boton submit donde se validan los campos y no deja enviar el formulario si alguno es incorrecto
function validarFormulario(){
	validarUsuario();
	validarPassword();
	validarPassword2();
	validarEmail();
	validarDNi();
	validarCP()
	validarTelefono()
	validarNombre();
	validarApellido1();
	validarApellido2();
	var form = document.formulario;
	if(campos.usuario && campos.password && campos.email && campos.dni && campos.telefono && campos.CP && campos.nombre && campos.apellido1 && campos.apellido2) {
		form.submit();
	} else {
		errorFormulario.show();
		return false;
	}
}

function darProvincia(cpostal){
    let cp_provincias = {
      1: "\u00C1lava", 2: "Albacete", 3: "Alicante", 4: "Almer\u00EDa", 5: "\u00C1vila",
      6: "Badajoz", 7: "Baleares", 08: "Barcelona", 09: "Burgos", 10: "C\u00E1ceres",
      11: "C\u00E1diz", 12: "Castell\u00F3n", 13: "Ciudad Real", 14: "C\u00F3rdoba", 15: "Coruña",
      16: "Cuenca", 17: "Gerona", 18: "Granada", 19: "Guadalajara", 20: "Guip\u00FAzcoa",
      21: "Huelva", 22: "Huesca", 23: "Ja\u00E9n", 24: "Le\u00F3n", 25: "L\u00E9rida",
      26: "La Rioja", 27: "Lugo", 28: "Madrid", 29: "M\u00E1laga", 30: "Murcia",
      31: "Navarra", 32: "Orense", 33: "Asturias", 34: "Palencia", 35: "Las Palmas",
      36: "Pontevedra", 37: "Salamanca", 38: "Santa Cruz de Tenerife", 39: "Cantabria", 40: "Segovia",
      41: "Sevilla", 42: "Soria", 43: "Tarragona", 44: "Teruel", 45: "Toledo",
      46: "Valencia", 47: "Valladolid", 48: "Vizcaya", 49: "Zamora", 50: "Zaragoza",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
      return cp_provincias[parseInt(cpostal.substring(0,2))];
    else
      return "---";
  }

  
function darComunidad(cpostal){
    let cp_comunidad = {
      1: "País Vasco", 2: "Castilla la mancha", 3: "Comunitat Valenciana", 4: "Andalucía", 5: "Castilla y León",
      6: "Extremadura", 7: "Baleares", 08: "Cataluña", 09: "Castilla y León", 10: "Extremadura",
      11: "Andalucía", 12: "Comunitat Valenciana", 13: "Castilla la mancha", 14: "Andalucía", 15: "Galicia",
      16: "Castilla la mancha", 17: "Cataluña", 18: "Andalucía", 19: "Castilla la mancha", 20: "País Vasco",
      21: "Andaluía", 22: "Aragón", 23: "Andalucía", 24: "Castilla y León", 25: "Cataluña",
      26: "La Rioja", 27: "Galicia", 28: "Madrid", 29: "Andalucía", 30: "Murcia",
      31: "Comunidad foral de navarra", 32: "Galicia", 33: "Principado de asturias", 34: "Castilla y León", 35: "Canarias",
      36: "Galicia", 37: "Castilla y León", 38: "Canarias", 39: "Cantabria", 40: "Castilla y León",
      41: "Andalucia", 42: "Castilla y León", 43: "Cataluña", 44: "Aragon", 45: "Castilla la mancha",
      46: "Comunitat Valenciana", 47: "Castilla y León", 48: "Pais vasco", 49: "Castilla y León", 50: "Aragón",
      51: "Ceuta", 52: "Melilla"
    };
    if(cpostal.length == 5 && cpostal <= 52999 && cpostal >= 1000)
      return cp_comunidad[parseInt(cpostal.substring(0,2))];
    else
      return "---";
  }

  let inputCP = document.getElementById('CP');
  inputCP.onkeyup = function(){
    document.getElementById('provincia').value = darProvincia(inputCP.value);
	document.getElementById('CA').value = darComunidad(inputCP.value);
  }

//asigna los eventListener a los diferentes campos
usuario.addEventListener('keyup',validarUsuario);
usuario.addEventListener('blur',validarUsuario);
password.addEventListener('keyup',validarPassword);
password.addEventListener('blur',validarPassword);
password2.addEventListener('keyup',validarPassword2);
password2.addEventListener('blur',validarPassword2);
email.addEventListener('keyup',validarEmail);
email.addEventListener('blur',validarEmail);
DNi.addEventListener('keyup',validarDNi);
DNi.addEventListener('blur',validarDNi);
telefono.addEventListener('keyup',validarTelefono);
telefono.addEventListener('blur',validarTelefono);
nombre.addEventListener('keyup',validarNombre);
nombre.addEventListener('blur',validarNombre);
apellido1.addEventListener('keyup',validarApellido1);
apellido1.addEventListener('blur',validarApellido1);
apellido2.addEventListener('keyup',validarApellido2);
apellido2.addEventListener('blur',validarApellido2);
CP.addEventListener('keyup',validarCP);
CP.addEventListener('blur',validarCP);