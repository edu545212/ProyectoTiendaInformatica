<?php
    //crea un nuevo DiscosDuros 
	function nuevoDiscosDuros($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'DiscosDuros')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO DiscosDuros VALUES (default, '$idProducto', '$Soket', $benchmark)";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el DiscosDuros
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
