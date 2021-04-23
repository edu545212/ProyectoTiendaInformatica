<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<h1>Usuarios</h1>
<div>
    <a class="btn btn-success" href="./NuevoU.php">Nuevo <i class="fa fa-plus"></i></a>
</div>
<br>
<table class="table table-striped table-responsive">
    <thead>
    <tr>
        <th>IdUsuario</th>
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
    <tbody>
    <?php
        $conexion = conectar(true);
        $consulta= consultarUsuario($conexion);
        while($fila=mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $fila['idUsuario'] ?></td>
        <td><?php echo $fila['Usuario']  ?></td>
        <td><?php echo $fila['Password']  ?></td>
        <td><?php echo $fila['Rol']  ?></td>
        <td><?php echo $fila['Nombre'] ?></td>
        <td><?php echo $fila['Apellido1']  ?></td>
        <td><?php echo $fila['Apellido2']  ?></td>
        <td><?php echo $fila['DNI']  ?></td>
        <td><?php echo $fila['Email']  ?></td>
        <td><?php echo $fila['Telefono']  ?></td>
        <td><?php echo $fila['CP']  ?></td>
        <td><?php echo $fila['Provincia']  ?></td>
        <td><?php echo $fila['ComunidadAutonoma']  ?></td>
        <td><?php echo $fila['Direccion']  ?></td>
        <td><a href="./EditarU.php?idUsuario=<?php echo $fila['idUsuario']; ?>" class="btn btn-raised btn-xs btn-success">Editar</a></a></td>
        <td><a href="./admin/EliminarU.php?idUsuario=<?php echo $fila['idUsuario']; ?>" class="btn btn-danger"  value="eliminar" name="eliminar" onclick="return ConfirmarEliminar()" ><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>