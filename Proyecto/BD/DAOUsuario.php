<?php
	//Funciones para el registro
	function consultarUsuarios($conexion, $usuario){
		$consulta = "SELECT * FROM Usuario WHERE Usuario = '$usuario'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function consultarCorreo($conexion, $email){
		$consulta = "SELECT * FROM Usuario WHERE Email = '$email'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function consultarDni($conexion, $dni){
		$consulta = "SELECT * FROM Usuario WHERE DNI = '$dni'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $Direccion){
		$consulta = "INSERT INTO Usuario VALUES (default, '$usuario', '$password', '$nombre', '$apellido1', '$apellido2', '$telefono', '$email', '$CP', '$provincia', '$CA','usuario', '$DNI', '$Direccion')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//Funciones login
	function consultaLogin($conexion, $usuario, $password){
		$consulta = "SELECT * FROM Usuario WHERE Usuario = '$usuario' AND Password = '$password'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function crearSesion($usuario){
		//Pongo el ID de "SESSION" con el DNI.
		session_id($usuario['DNI']);
		//Creo la sesión.
		session_start();
		//Almacenamos todos los datos de la sesión.
		$_SESSION['idUsuario'] = $usuario['idUsuario'];
		$_SESSION['Usuario'] = $usuario['Usuario'];
		$_SESSION['Password'] = $usuario['Password'];
		$_SESSION['Nombre'] = $usuario['Nombre'];
		$_SESSION['Apellido1'] = $usuario['Apellido1'];
		$_SESSION['Apellido2'] = $usuario['Apellido2'];
		$_SESSION['Telefono'] = $usuario['Telefono'];
		$_SESSION['Email'] = $usuario['Email'];
		$_SESSION['CP'] = $usuario['CP'];
		$_SESSION['Provincia'] = $usuario['Provincia'];
		$_SESSION['ComunidadAutonoma'] = $usuario['ComunidadAutonoma'];
		$_SESSION['Rol'] = $usuario['Rol'];
		$_SESSION['DNI'] = $usuario['DNI'];
	}

	//Funciones de recuperar contraseñas
	function consultarRuperar($conexion, $usuario, $dni){
		$consulta = "SELECT * FROM Usuario WHERE Usuario = '$usuario' AND DNI = '$dni'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function modifcarContraseña($conexion, $usuario, $password, $dni){
		$consulta = "UPDATE Usuario SET Password= '$password' WHERE Usuario = '$usuario' AND DNI = '$dni'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//funciones de usuario del panel de administrador
	function consultarUsuario($conexion){
		$consulta = "SELECT * FROM Usuario ORDER BY idUsuario";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function EliminarUsuario($conexion, $id){
		$consulta = "DELETE FROM Usuario WHERE idUsuario = '$id'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function EditarUsuarioFromulario($conexion, $id){
		$consulta = "SELECT * FROM Usuario WHERE idUsuario = '$id'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function  insertarUsuarioAdmin($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $ROL, $Direccion){
		$consulta = "INSERT INTO Usuario VALUES (default, '$usuario', '$password', '$nombre', '$apellido1', '$apellido2', '$telefono', '$email', '$CP', '$provincia', '$CA','$ROL', '$DNI', '$Direccion')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function EditarUsuarioAdmin($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $ROL, $Direccion){
		$consulta = "UPDATE Usuario SET Password='$password', Nombre='$nombre', Apellido1='$apellido1', Apellido2='$apellido2', Telefono='$telefono', 
		Email='$email', CP='$CP', Provincia='$provincia', ComunidadAutonoma='$CA', Rol='$ROL', DNi='$DNI' , Direccion='$Direccion' WHERE Usuario = '$usuario'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function EditarUsuario($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $Direccion){
		$consulta = "UPDATE Usuario SET Password='$password', Nombre='$nombre', Apellido1='$apellido1', Apellido2='$apellido2', Telefono='$telefono', 
		Email='$email', CP='$CP', Provincia='$provincia', ComunidadAutonoma='$CA', DNi='$DNI', Direccion='$Direccion' WHERE Usuario = '$usuario'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

?>