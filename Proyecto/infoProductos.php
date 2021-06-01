<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOProductos.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Información del producto</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
        <div class="container">
            <div class="row">
                <div class="page-header">
                </div>
                <?php
                    $conexion = conectar(true);
                    $idProductos=($_GET['idProductos']);
                    $productoinfo= infoProductos($conexion, $idProductos);
                    while($fila=mysqli_fetch_array($productoinfo)){
                ?>  
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
            </div>
        </div>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>