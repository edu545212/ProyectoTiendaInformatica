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

    $query = "SELECT * FROM Cajas INNER JOIN Productos
		ON Cajas.idProductos = Productos.idProductos";

    if (isset($_POST['consulta'])) {
    	$busquedaCajas = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM Cajas INNER JOIN Productos
      ON Cajas.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaCajas%' OR Descripcion LIKE '%$busquedaCajas%' OR Precio LIKE '%$busquedaCajas%' OR Stock LIKE '%$busquedaCajas%' OR Imagen LIKE '%$busquedaCajas%' OR Marca LIKE '%$busquedaCajas%' OR Tipo LIKE '%$busquedaCajas%'";
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
                        <td><a href='./EditarC.php?idCajas=".$fila["idCajas"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./productos/eliminar/EliminarC.php?idCajas=".$fila["idCajas"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Cajas no encontrado";
    }
    echo $salida;

    $conn->close();
?>