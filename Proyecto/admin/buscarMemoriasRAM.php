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

    $query = "SELECT * FROM MemoriasRAM INNER JOIN Productos
		ON MemoriasRAM.idProductos = Productos.idProductos";

    if (isset($_POST['consulta'])) {
    	$busquedaMemoriasRAM = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM MemoriasRAM INNER JOIN Productos
      ON MemoriasRAM.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaMemoriasRAM%' OR Descripcion LIKE '%$busquedaMemoriasRAM%' OR Precio LIKE '%$busquedaMemoriasRAM%' OR Stock LIKE '%$busquedaMemoriasRAM%' OR Imagen LIKE '%$busquedaMemoriasRAM%' OR Marca LIKE '%$busquedaMemoriasRAM%' OR Almacenamiento LIKE '%$busquedaMemoriasRAM%' OR Formato LIKE '%$busquedaMemoriasRAM%' OR Tipo LIKE '%$busquedaMemoriasRAM%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='tabla_datos table table-striped table-responsive'>
                    <thead>
                        <tr  id='titulo'>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Marca</th>
                            <th>Almacenamiento</th>
                            <th>Formato</th>
                            <th>Tipo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
    			<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
                        <td>".$fila["Nombre"]."</td>
                        <td><div style='width:400px; height:115px; overflow: auto'>".$fila["Descripcion"]."</div></td>
                        <td>".$fila["Precio"]."</td>
                        <td>".$fila["Stock"]."</td>
                        <td>".$fila["Imagen"]."</td>
                        <td>".$fila["Marca"]."</td>
                        <td>".$fila["Almacenamiento"]."</td>
                        <td>".$fila["Formato"]."</td>
                        <td>".$fila["Tipo"]."</td>
                        <td><a href='./EditarM.php?idMemoriasRAM=".$fila["idMemoriasRAM"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./productos/eliminar/EliminarM.php?idMemoriasRAM=".$fila["idMemoriasRAM"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="MemoriasRAM no encontrado";
    }
    echo $salida;

    $conn->close();
?>