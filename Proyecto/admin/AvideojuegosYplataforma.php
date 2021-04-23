<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<h1>Videojuegos y plataformas</h1>
<div>
    <a class="btn btn-success" href="./NuevoVJYP.php">Nuevo <i class="fa fa-plus"></i></a>
</div>
<br>
<table class="table table-striped table-responsive">
    <thead>
    <tr>
        <th>IdProducto</th>
        <th>Stock </th>
        <th>Precio </th>
        <th>Titulo </th>
        <th>Plataforma</th>
        <th>Editar </th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $conexion = conectar(true);
        $consulta= consultaVideojuegosYPlataforma($conexion);
        while($fila=mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $fila['idProductos'] ?></td>
        <td><?php echo $fila['Stock']  ?></td>
        <td><?php echo $fila['Precio']  ?></td>
        <td><?php echo $fila['Titulo']  ?></td>
        <td><?php echo $fila['Nombre']  ?></td>
        <td><a href="./EditarVJYP.php?idProductos=<?php echo $fila['idProductos']; ?>" class="btn btn-raised btn-xs btn-success">Editar</a></a></td>
        <td><a href="./admin/EliminarVJYP.php?idProductos=<?php echo $fila['idProductos']; ?>" value="eliminar" name="eliminar" onclick="return ConfirmarEliminar()" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
