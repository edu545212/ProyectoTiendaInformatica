<?php
    //crea un nuevo TarjetasGraficas 
	function nuevoTarjetasGraficas($conexion, $Nombre, $Marca, $Tipo, $Memoria ,$benchmark, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'TarjetasGraficas')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO TarjetasGraficas VALUES (default, '$idProducto', '$Tipo', '$Memoria', '$benchmark')";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el TarjetasGraficas
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
