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
    
    //cuando no hay nada en el buscador
    $query = "SELECT * FROM DiscosDuros INNER JOIN Productos
		ON DiscosDuros.idProductos = Productos.idProductos";
    
    //cuando existe algo en el buscador
    if (isset($_POST['consulta'])) {
    	$busquedaDiscosDuros = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM DiscosDuros INNER JOIN Productos
      ON DiscosDuros.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaDiscosDuros%' OR Descripcion LIKE '%$busquedaDiscosDuros%' OR Precio LIKE '%$busquedaDiscosDuros%' OR Stock LIKE '%$busquedaDiscosDuros%' OR Imagen LIKE '%$busquedaDiscosDuros%' OR Marca LIKE '%$busquedaDiscosDuros%' OR Capacidad LIKE '%$busquedaDiscosDuros%' OR Tipo LIKE '%$busquedaDiscosDuros%'";
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
                            <th>Capacidad</th>
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
                        <td>".$fila["Capacidad"]."</td>
                        <td>".$fila["Tipo"]."</td>
                        <td><a href='./EditarD.php?idDiscosDuros=".$fila["idDiscosDuros"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./productos/eliminar/EliminarD.php?idDiscosDuros=".$fila["idDiscosDuros"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="DiscosDuros no encontrado";
    }
    echo $salida;

    $conn->close();
?>