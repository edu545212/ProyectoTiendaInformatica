<?php
	//funcion para el carrousel de las plataformas
	function consultarPlataformaCarrousel($conexion){
		$consulta = "SELECT idPlataforma, ImagenP FROM Plataforma ORDER BY rand() LIMIT 3";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//funcion que muestra todas las plataformas
	function consultarPlataforma($conexion){
		$consulta = "SELECT * FROM Plataforma ORDER BY idPlataforma";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para consultar el id y nombre de la plataforma (selector de plataforma)
	function consultaPlataformaVideojuego($conexion){
		$consulta = "SELECT idPlataforma, Nombre FROM Plataforma";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para mostrar la informacion de la plataformas
	function infoPlataforma($conexion, $idPlataforma){
		$consulta = "SELECT * FROM Plataforma WHERE idPlataforma='".$idPlataforma."'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para eliminar la videoconsola
	function eliminarPlataforma($conexion, $id){
		$consulta = "DELETE FROM Plataforma WHERE idPlataforma = '$id'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar la videoconsola
	function editarPlataforma($conexion, $lanzamiento, $precioP, $stockP, $DescripcionP, $imagenP, $logo, $nombre){
		$consulta = "UPDATE Plataforma SET `Lanzamiento` = '$lanzamiento', `PrecioP` = '$precioP', `StockP` = '$stockP', `DescripcionP` = '$DescripcionP', `ImagenP` = '$imagenP' , `Logo` = '$logo' WHERE (`Nombre` = '$nombre');";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar la videoconsola
	function editarPlataformaNoImagenes($conexion, $lanzamiento, $precioP, $stockP, $DescripcionP, $nombre){
		$consulta = "UPDATE Plataforma SET `Lanzamiento` = '$lanzamiento', `PrecioP` = '$precioP', `StockP` = '$stockP', `DescripcionP` = '$DescripcionP' WHERE (`Nombre` = '$nombre');";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar la videoconsola
	function editarPlataformaNoLogo($conexion, $lanzamiento, $precioP, $stockP, $DescripcionP, $imagenP, $nombre){
		$consulta = "UPDATE Plataforma SET `Lanzamiento` = '$lanzamiento', `PrecioP` = '$precioP', `StockP` = '$stockP', `DescripcionP` = '$DescripcionP', `ImagenP` = '$imagenP' WHERE (`Nombre` = '$nombre');";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para editar la videoconsola
	function editarPlataformaNoImagen($conexion, $lanzamiento, $precioP, $stockP, $DescripcionP, $logo, $nombre){
		$consulta = "UPDATE Plataforma SET `Lanzamiento` = '$lanzamiento', `PrecioP` = '$precioP', `StockP` = '$stockP', `DescripcionP` = '$DescripcionP', `Logo` = '$logo' WHERE (`Nombre` = '$nombre');";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion para consultar si existe el nombre de la plataforma
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Plataforma WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
	
	//crea una nueva plataforma 
	function nuevaPlataforma($conexion, $nombre, $lanzamiento, $precioP, $stockP, $descripcionP, $nombreImg, $nombreLogo){
		$consulta = "INSERT INTO Plataforma VALUES (default, '$nombre', '$lanzamiento', '$precioP', '$stockP', '$descripcionP', '$nombreImg', '$nombreLogo')";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>