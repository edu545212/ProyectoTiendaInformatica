<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<?php
	require "./BD/conector_bd.php";
	require "./BD/DAOMemoriasRAM.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Editar MemoriasRAM</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./productos/editar/editarMemoriasRAM.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Editar MemoriasRAM</h1>

                    <?php
                        $conexion = conectar(true);
                        $idMemoriasRAM=($_GET['idMemoriasRAM']);
                        $consulta= editarMemoriasRAMFormulario($conexion, $idMemoriasRAM);
                        while($fila=mysqli_fetch_array($consulta)){
                    ?>

                    <div class="form-group col-8 col-md-5">
                        <label for="Nombre" class="visually-hidden">Nombre</label>
                        <input id="Nombre" type="text" class="form-control" value="<?php echo $fila['Nombre']?>" name="Nombre" placeholder="Nombre"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Marca" class="visually-hidden">Marca</label>
                        <input id="Marca" type="text" class="form-control" value="<?php echo $fila['Marca']?>" name="Marca" placeholder="Marca"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Almacenamiento" class="visually-hidden">Almacenamiento</label>
                        <input id="Almacenamiento" type="text" class="form-control" value="<?php echo $fila['Almacenamiento']?>" name="Almacenamiento" placeholder="Almacenamiento"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Formato" class="visually-hidden">Formato</label>
                        <input id="Formato" type="text" class="form-control" value="<?php echo $fila['Formato']?>" name="Formato" placeholder="Formato"  required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Tipo" class="visually-hidden">Tipo</label>
                        <input id="Tipo" type="text" class="form-control" value="<?php echo $fila['Tipo']?>" name="Tipo" placeholder="Tipo" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">Imagen</label>
                        <input id="imagen" type="file" class="form-control-file" value="<?php echo $fila['Imagen']?>" name="imagen">
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" value="<?php echo $fila['Stock']?>" name="Stock" placeholder="Stock"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" value="<?php echo $fila['Precio']?>" name="Precio" placeholder="Precio"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Descripcion" class="visually-hidden">Descripcion</label>
                        <input id="Descripcion" type="text" class="form-control" value="<?php echo $fila['Descripcion']?>" name="Descripcion" placeholder="Descripcion" required>
                    </div> 

                    <?php 
                        }
                    ?>

                    <button class="col-8 col-md-5 btn btn-primary" type="submit">Editar MemoriasRAM</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>