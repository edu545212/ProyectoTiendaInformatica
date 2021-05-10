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

    $query = "SELECT * FROM Procesador INNER JOIN Productos
		ON Procesador.idProductos = Productos.idProductos";

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
                            <th>idProductos</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Marca</th>
                            <th>Categoria</th>
                            <th>Soket</th>
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
                        <td>".$fila["Soket"]."</td>
                        <td><a href='./EditarU.php?idProcesador=".$fila["idProcesador"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./admin/EliminarU.php?idProcesador=".$fila["idProcesador"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Procesador no encontrado";
    }
    echo $salida;

    $conn->close();
?>