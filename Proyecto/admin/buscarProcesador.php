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
    $query = "SELECT * FROM Procesador INNER JOIN Productos
		ON Procesador.idProductos = Productos.idProductos";

    //cuando existe algo en el buscador
    if (isset($_POST['consulta'])) {
    	$busquedaProcesador = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM Procesador INNER JOIN Productos
      ON Procesador.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaProcesador%' OR Descripcion LIKE '%$busquedaProcesador%' OR Precio LIKE '%$busquedaProcesador%' OR Stock LIKE '%$busquedaProcesador%' OR Imagen LIKE '%$busquedaProcesador%' OR Marca LIKE '%$busquedaProcesador%' OR Soket LIKE '%$busquedaProcesador%'";
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
                            <th>Soket</th>
                            <th>Benchmark</th>
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
                        <td>".$fila["Soket"]."</td>
                        <td>".$fila["Benchmark"]."</td>
                        <td><a href='./EditarP.php?idProcesador=".$fila["idProcesador"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./productos/eliminar/EliminarP.php?idProcesador=".$fila["idProcesador"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Procesador no encontrado";
    }
    echo $salida;

    $conn->close();
?>