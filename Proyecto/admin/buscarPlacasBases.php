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

    $query = "SELECT * FROM PlacasBases INNER JOIN Productos
		ON PlacasBases.idProductos = Productos.idProductos";

    if (isset($_POST['consulta'])) {
    	$busquedaPlacasBases = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM PlacasBases INNER JOIN Productos
      ON PlacasBases.idProductos = Productos.idProductos WHERE Nombre LIKE '%$busquedaPlacasBases%' OR Descripcion LIKE '%$busquedaPlacasBases%' OR Precio LIKE '%$busquedaPlacasBases%' OR Stock LIKE '%$busquedaPlacasBases%' OR Imagen LIKE '%$busquedaPlacasBases%' OR Marca LIKE '%$busquedaPlacasBases%' OR Chipset LIKE '%$busquedaPlacasBases%' OR Forma LIKE '%$busquedaPlacasBases%'";
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
                            <th>Chipset</th>
                            <th>Forma</th>
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
                        <td>".$fila["Chipset"]."</td>
                        <td>".$fila["Forma"]."</td>
                        <td><a href='./EditarU.php?idPlacasBases=".$fila["idPlacasBases"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
                        <td><a href='./admin/EliminarU.php?idPlacasBases=".$fila["idPlacasBases"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="PlacasBases no encontrado";
    }
    echo $salida;

    $conn->close();
?>