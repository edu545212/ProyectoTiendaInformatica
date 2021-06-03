<?php
    //Crea un comentario
	function NuevoComentario($conexion, $idUsuario, $idProducto, $Comentario, $Valoracion){
		$consulta = "INSERT INTO Comentarios VALUES (default, '$idUsuario', '$idProducto', '$Comentario', '$Valoracion')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function consultaComentario($conexion, $idProducto){
		$consulta = "SELECT * FROM Comentarios INNER JOIN Usuario ON Comentarios.idUsuario = Usuario.idUsuario WHERE idProducto= '$idProducto'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function EliminarComentario($conexion, $idComentarios){
		$consulta = "DELETE FROM Comentarios WHERE idComentarios = '$idComentarios'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

?>