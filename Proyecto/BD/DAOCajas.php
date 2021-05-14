<?php
    //crea un nuevo Cajas 
	function nuevoCajas($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'Cajas')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO Cajas VALUES (default, '$idProducto', '$Tipo')";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el Cajas
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}
?>
