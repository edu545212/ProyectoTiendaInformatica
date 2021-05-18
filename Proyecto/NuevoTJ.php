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
	require "./BD/DAOTarjetasGraficas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo Tarjetas Graficas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./productos/nuevo/nuevoTarjetasGraficas.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Nuevo Tarjetas Graficas</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="Nombre" class="visually-hidden">Nombre</label>
                        <input id="Nombre" type="text" class="form-control" name="Nombre" placeholder="Nombre"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Marca" class="visually-hidden">Marca</label>
                        <input id="Marca" type="text" class="form-control" name="Marca" placeholder="Marca"  required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Tipo" class="visually-hidden">Tipo</label>
                        <input id="Tipo" type="text" class="form-control" name="Tipo" placeholder="Tipo" required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Memoria" class="visually-hidden">Memoria</label>
                        <input id="Memoria" type="text" class="form-control" name="Memoria" placeholder="Memoria" required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Benchmark" class="visually-hidden">Benchmark</label>
                        <input id="Benchmark" type="text" class="form-control" name="Benchmark" placeholder="Benchmark" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">Imagen</label>
                        <input id="imagen" type="file" class="form-control-file" name="imagen" required >
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" name="Stock" placeholder="Stock"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" name="Precio" placeholder="Precio"  required>
                    </div>

                    <div class="form-group col-8 col-md-8">
                        <label for="Descripcion" class="visually-hidden">Descripcion</label>
                        <input id="Descripcion" type="text" class="form-control" name="Descripcion" placeholder="Descripcion" required>
                    </div> 

                    <button class="col-8 col-md-5 btn btn-primary" type="submit">Registrar nuevo Tarjetas Graficas</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>