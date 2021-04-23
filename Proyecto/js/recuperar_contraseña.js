//consntante que obtiene los datos
const usuario = document.getElementById("usuario");
const password = document.getElementById("password");
const password2 = document.getElementById("password2");
const DNi = document.getElementById("DNI");

//constantes que optiene los errores 
const errorUsuario = $('#errorUsuario');
const errorPassword = $('#errorPassword');
const errorPassword2 = $('#errorPassword2');
const errorDNi = $('#errorDNi');
const errorFormulario = $('#errorFormulario');

//ocultar errores por defecto
errorUsuario.hide();
errorPassword.hide();
errorPassword2.hide();
errorDNi.hide();
errorFormulario.hide();

//constante que almacena las expresiones regulares de los distintos campos
const expresiones ={
	usuario: /^[a-zA-ZÁ-Źá-ź0-9\_\-]{1,45}$/,
    password: /^(?=.*\d)(?=.*[\u0021-\u002f\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,45}$/,
    dni: /^\d{8}[A-Z]$/
}

//constante que establece los campos en false para no poder enviar el formulario
const campos = {
	usuario: false,
	password: false,
	dni: false
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
		errorUsuario.show();
		usuario.className = "form-control is-invalid";
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
function validar() {
	validarDNi();
	validarUsuario();
	validarPassword();
	validarPassword2();
	var form = document.formulario;
	if (campos.usuario && campos.password && campos.dni) {
		form.submit();
	} else {
		errorFormulario.show();
		return false;
	}
}

//asigna los eventListener a los diferentes campos
usuario.addEventListener('keyup',validarUsuario);
usuario.addEventListener('blur',validarUsuario);
password.addEventListener('keyup',validarPassword);
password.addEventListener('blur',validarPassword);
password2.addEventListener('keyup',validarPassword2);
password2.addEventListener('blur',validarPassword2);
DNi.addEventListener('keyup',validarDNi);
DNi.addEventListener('blur',validarDNi);
