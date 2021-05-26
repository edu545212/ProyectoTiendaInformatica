<?php
	  $servidor = "leonmunozeduardo-db.c0iucejz0d7p.eu-west-3.rds.amazonaws.com";
    $usuario = "EduardoRTX";
  	$contraseña = "SoyEduardo1";
  	$bd = "TiendaInformatica";

	$conn = new mysqli($servidor, $usuario, $contraseña, $bd);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM TarjetasGraficas INNER JOIN Productos
		ON TarjetasGraficas.idProductos = Productos.idProductos";

    if (isset($_POST['consulta'])) {
    	$busquedaTarjetasGraficas = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM TarjetasGraficas INNER JOIN Productos
      ON TarjetasGraficas.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaTarjetasGraficas%' OR Descripcion LIKE '%$busquedaTarjetasGraficas%' OR Precio LIKE '%$busquedaTarjetasGraficas%' OR Stock LIKE '%$busquedaTarjetasGraficas%' OR Imagen LIKE '%$busquedaTarjetasGraficas%' OR Marca LIKE '%$busquedaTarjetasGraficas%' OR Tipo LIKE '%$busquedaTarjetasGraficas%' OR Memoria LIKE '%$busquedaTarjetasGraficas%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='tabla_datos table table-striped table-responsive'>
                    <thead>
                        <tr  id='titulo'>
                            <th>idProductos</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Tipo</th>
                            <th>Memoria</th>
                            <th>Benchmark</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
    			<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
                        <td>".$fila["idProductos"]."</td>
                        <td>".$fila["Nombre"]."</td>
                        <td>".$fila["Descripcion"]."</td>
                        <td>".$fila["Precio"]."</td>
                        <td>".$fila["Stock"]."</td>
                        <td>".$fila["Imagen"]."</td>
                        <td>".$fila["Marca"]."</td>
                        <td>".$fila["Categoria"]."</td>
                        <td>".$fila["Tipo"]."</td>
                        <td>".$fila["Memoria"]."</td>
                        <td>".$fila["Benchmark"]."</td>
                        <td><a href='./EditarTJ.php?idTarjetasGraficas=".$fila["idTarjetasGraficas"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./productos/eliminar/EliminarTJ.php?idTarjetasGraficas=".$fila["idTarjetasGraficas"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="TarjetasGraficas no encontrado";
    }
    echo $salida;

    $conn->close();
?>