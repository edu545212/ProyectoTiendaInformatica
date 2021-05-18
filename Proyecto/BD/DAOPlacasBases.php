<?php
    //crea un nuevo PlacasBases 
	function nuevoPlacasBases($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'PlacasBases')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO PlacasBases VALUES (default, '$idProducto', '$Chipset', '$Forma')";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el PlacasBases
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
