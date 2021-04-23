<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<h1>Videojuegos</h1>
<div>
    <a class="btn btn-success" href="./NuevoVJ.php">Nuevo <i class="fa fa-plus"></i></a>
</div>
<br>
<table class="table table-striped table-responsive">
    <thead>
    <tr>
        <th>idVideojuego</th>
        <th>Titulo </th>
        <th>Compañia </th>
        <th>Publicacion </th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Editar </th>
        <th>Eliminar</th>
    </tr>
    </thead>
    <tbody>
    <?php
        $conexion = conectar(true);
        $consulta= consultaVideojuegos($conexion);
        while($fila=mysqli_fetch_array($consulta)){
    ?>
    <tr>
        <td><?php echo $fila['idVideojuego'] ?></td>
        <td><?php echo $fila['Titulo']  ?></td>
        <td><?php echo $fila['Compañia']  ?></td>
        <td><?php echo $fila['Publicacion']  ?></td>
        <td><div style="width:400px; height:115px; overflow: auto;"><?php echo $fila['Descripcion']  ?></div></td>
        <td><?php echo $fila['Imagen']  ?></td>
        <td><a href="./EditarVJ.php?idVideojuego=<?php echo $fila['idVideojuego']; ?>" class="btn btn-raised btn-xs btn-success">Editar</a></a></td>
        <td><a href="./admin/EliminarVJ.php?idVideojuego=<?php echo $fila['idVideojuego']; ?>" value="eliminar" name="eliminar" onclick="return ConfirmarEliminar()" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
    </tr>
    <?php } ?>
    </tbody>
</table>
