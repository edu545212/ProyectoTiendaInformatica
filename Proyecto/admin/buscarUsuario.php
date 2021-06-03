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
    $query = "SELECT * FROM Usuario WHERE idUsuario NOT LIKE '' ORDER By idUsuario";
    
    //cuando existe algo en el buscador
    if (isset($_POST['consulta'])) {
    	$busquedaUsuario = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM Usuario WHERE idUsuario LIKE '%$busquedaUsuario%' OR Usuario LIKE '%$busquedaUsuario%' OR Nombre LIKE '%$busquedaUsuario%' OR Apellido1 LIKE '%$busquedaUsuario%' OR Apellido2 LIKE '%$busquedaUsuario%' OR Telefono LIKE '%$busquedaUsuario%' OR Email LIKE '%$busquedaUsuario%' OR CP LIKE '%$busquedaUsuario%' OR DNI LIKE '%$busquedaUsuario%' OR Provincia LIKE '%$busquedaUsuario%' OR ComunidadAutonoma LIKE '%$busquedaUsuario%' OR Direccion LIKE '%$busquedaUsuario%' OR Rol LIKE '%$busquedaUsuario%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table class='tabla_datos table table-striped table-responsive'>
    			<thead>
    				<tr id='titulo'>
              <th>Usuario </th>
              <th>Password </th>
              <th>Rol </th>
              <th>Nombre </th>
              <th>Apellido 1 </th>
              <th>Apellido 2 </th>
              <th>Dni </th>
              <th>Email </th>
              <th>Telefono </th>
              <th>Codigo Postal </th>
              <th>Provincia </th>
              <th>Comunidad Autonoma </th>
              <th>Direccion</th>
              <th>Editar</th>
              <th>Eliminar</th>
    				</tr>
    			</thead>
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
        <td>".$fila["Usuario"]."</td>
        <td>".$fila["Password"]."</td>
        <td>".$fila["Rol"]."</td>
        <td>".$fila["Nombre"]."</td>
        <td>".$fila["Apellido1"]."</td>
        <td>".$fila["Apellido2"]."</td>
        <td>".$fila["DNI"]."</td>
        <td>".$fila["Email"]."</td>
        <td>".$fila["Telefono"]."</td>
        <td>".$fila["CP"]."</td>
        <td>".$fila["Provincia"]."</td>
        <td>".$fila["ComunidadAutonoma"]."</td>
        <td>".$fila["Direccion"]."</td>
        <td><a href='./EditarU.php?idUsuario=".$fila["idUsuario"]."' class='btn btn-raised btn-xs btn-success'>Editar</a></a></td>
        <td><a href='./usuarios/EliminarU.php?idUsuario=".$fila["idUsuario"]."' class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="Usuario no encontrado";
    }
    echo $salida;
    $conn->close();

?>