<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOProductos.php";
    require "./BD/DAOComentarios.php";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Información del producto</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php
        $conexion = conectar(true);
        $idProductos=($_GET['idProductos']);

        $sql = "SELECT AVG(`Valoracion`) AS Valoracion FROM Comentarios WHERE idProducto = '$idProductos'";
        $result = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_object($result) ;

        $productoinfo= infoProductos($conexion, $idProductos);
        while($fila=mysqli_fetch_array($productoinfo)){
    ?> 
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $fila['Categoria']; ?>.php">Tienda</a></li>
            <li class="breadcrumb-item active" aria-current="page">Info Productos</li>
        </ol>
    </nav>
    <?php include './inc/nav.php'; ?>
        <main>
        <div class="container">
            <div class="row">
                <div class="page-header">
                </div> 
                    <h1 class="col-12 text-center mb-2">Información de producto</h1>

                    <div class="col-12 col-sm-6">
                        <br><br><br>
                        <img style="width:600px; height:400px" class="img-fluid img-thumbnail rounded" alt="Productos" src="./img/<?php echo $fila['Categoria']; ?>/<?php echo $fila['Imagen'];?>">
                    </div>
                    
                    <div class="col-12 col-sm-6">
                        <br><br>
                        <h4><strong>Nombre: </strong><?php echo $fila['Nombre']; ?></h4><br>
                        <h4><strong>Precio: </strong><?php echo $fila['Precio']; ?>€</h4><br>
                        <h4><strong>Cantidad: </strong><?php echo $fila['Stock']; ?></h4><br>
                        <?php
                        if($fila['Stock']>=1){
                            if($_SESSION['Rol']!=""){
                                echo '<form action="./carrito/agregarCarrito.php" method="POST" class="FormCatElec" data-form="">
                                    <input type="hidden" value="'.$fila['idProductos'].'" name="idProductos">
                                    <label class="text-center"><small>Agrega la cantidad de productos que añadiras al carrito de compras (Maximo '.$fila['Stock'].' productos)</small></label>
                                    <div class="form-group">
                                        <input type="number" class="form-control" value="1" min="1" max="'.$fila['Stock'].'" name="cantidad">
                                    </div>
                                    <button class="btn btn-lg btn-raised btn-success btn-block"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito</button>
                                </form>
                                <div class="ResForm"></div>';
                            }else{
                                echo '<p class="text-center"><small>Para agregar productos al carrito de compras debes iniciar sesion</small></p><br>';
                                echo '<a href="login.php" class="btn btn-lg btn-raised btn-info btn-block" ><i class="fa fa-user"></i>&nbsp;&nbsp; Iniciar sesion</a>';
                            }
                        }else{
                            echo '<p class="text-center text-danger lead">No hay existencias de este producto</p><br>';
                        }
                        echo '<br>
                        <div class="text-center">
                        <a href="'.$fila['Categoria'].'.php" class="btn col-5 btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a>
                        </div>
                    </div>'; 
                    ?>   

                    <div class="col-12 mt-5">
                        <h4><strong>Descripción: </strong><?php echo $fila['Descripcion']; ?></h4><br>
                    <div>
                <?php
                    }   
                ?>
                <?php
                    if($_SESSION['Rol']=="admin" || $_SESSION['Rol']=="usuario"){
                        echo '<form name="formulario" method="post" action="./productos/nuevo/nuevoComentario.php" id="loginform">
                        <div class="container row justify-content-center">
    
                            <div class="form-group col-8 col-md-8 hidden">
                                <label for="idProducto" class="visually-hidden">idProducto</label>
                                <input id="idProducto" type="text" class="form-control" value="'.$idProductos.'" name="idProducto" placeholder="idProducto" required>
                            </div> 
    
                            <div class="form-group col-8 col-md-8 hidden">
                                <label for="idUsuario" class="visually-hidden">idUsuario</label>
                                <input id="idUsuario" type="text" class="form-control" value="'.$_SESSION['idUsuario'].'" name="idUsuario" placeholder="idUsuario" required>
                            </div> 
    
                            <div class="form-group col-8 col-md-8">
                                <label for="Comentario" class="visually-hidden">Comentario</label>
                                <input id="Comentario" type="text" class="form-control" name="Comentario" placeholder="Comentario" required>
                            </div>
    
                            <div class="form-group col-8 col-md-8">
                                <label for="Valoracion">Valoracion (1 al 10):</label>
                                <input type="range" id="Valoracion" name="Valoracion" min="1" max="10">
                            </div> 
                            <p>Media de valoraciones: '.$row->Valoracion.' </p>
    
                            <button class="col-8 col-md-5 btn btn-primary" type="submit">Enviar comentario</button>
                        </div>
                    </form>';
                    } else {
                        echo '<p>Media de valoraciones: '.$row->Valoracion.' </p>';
                    }
                ?>

                <div class="col-12">
                    <h1>Comentarios</h1>
                    <br>
                    <table class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Comentario</th>
                            <th>Valoracion</th>
                            <th>Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $conexion = conectar(true);
                            $consulta= consultaComentario($conexion, $idProductos);
                            while($fila=mysqli_fetch_array($consulta)){
                        ?>
                        <tr>
                            <td><?php echo $fila['Usuario']  ?></td>
                            <td><div style="width:400px; height:115px; overflow: auto;"><?php echo $fila['Comentario'] ?><div></td>
                            <td><?php echo $fila['Valoracion'] ?>/10</td>
                            <?php
                                if($_SESSION['idUsuario'] == $fila['idUsuario']){
                                    echo "<td><a href='./productos/eliminar/EliminarComentarios.php?idComentarios=".$fila["idComentarios"]."&idProducto=".$fila["idProducto"]."' 
                                    class='btn btn-danger'  value='eliminar' name='eliminar' onclick='return ConfirmarEliminar()' ><i class='fa fa-trash'></i></a></td>";
                                } else {
                                    echo '';
                                }
                            ?>
                        </tr>
                        <?php } ?>
                        </tbody>
                    </table>        
                <div>

            </div>
        </div>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>