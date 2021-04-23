<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<h1>Videoconsola</h1>
<div>
    <a class="btn btn-success" href="./NuevoVC.php"> Nuevo <i class="fa fa-plus"></i></a>
</div>
<br>
<table class="table table-striped table-responsive">
    <thead>
    <tr>
        <th>IdPlataforma</th>
        <th>Nombre</th>
        <th>Lanzamiento </th>
        <th>Precio</th>
        <th>Stock</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Logo</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $conexion = conectar(true);
        $consulta= consultarPlataforma($conexion);
        while($fila=mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $fila['idPlataforma'] ?></td>
        <td><?php echo $fila['Nombre']  ?></td>
        <td><?php echo $fila['Lanzamiento']  ?></td>
        <td><?php echo $fila['PrecioP'] ?></td>
        <td><?php echo $fila['StockP'] ?></td>
        <td><div style="width:400px; height:115px; overflow: auto;"><?php echo $fila['DescripcionP'] ?><div></td>
        <td><?php echo $fila['ImagenP'] ?></td>
        <td><?php echo $fila['Logo'] ?></td>
        <td><a href="./EditarVC.php?idPlataforma=<?php echo $fila['idPlataforma']; ?>" class="btn btn-raised btn-xs btn-success">Editar</a></a></td>
        <td><a href="./admin/EliminarVC.php?idPlataforma=<?php echo $fila['idPlataforma']; ?>" value="eliminar" name="eliminar" onclick="return ConfirmarEliminar()" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
