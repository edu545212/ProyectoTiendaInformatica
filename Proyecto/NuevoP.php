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
	require "./BD/DAOProcesador.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Nuevo Procesador</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Nuevo_videojuego.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Nuevo Procesador</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="Titulo" class="visually-hidden">Titulo</label>
                        <input id="Titulo" type="text" class="form-control" name="Titulo" placeholder="Titulo"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Compañia" class="visually-hidden">Compañia</label>
                        <input id="Compañia" type="text" class="form-control" name="Compañia" placeholder="Compañia"  required>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Publicacion" class="visually-hidden">Publicacion</label>
                        <input id="Publicacion" type="date" class="form-control" name="Publicacion" placeholder="Publicacion" required>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="imagen" class="visually-hidden">Imagen</label>
                        <input id="imagen" type="file" class="form-control-file" name="imagen" required >
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Descripcion" class="visually-hidden">Descripcion</label>
                        <input id="Descripcion" type="text" class="form-control" name="Descripcion" placeholder="Descripcion" required>
                    </div> 

                    <div class="form-group col-8 col-md-5">
                        <label for="Stock" class="visually-hidden">Stock</label>
                        <input id="Stock" type="number" class="form-control" name="Stock" placeholder="Stock"  required>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Precio" class="visually-hidden">Precio</label>
                        <input id="Precio" type="number" class="form-control" name="Precio" placeholder="Precio"  required>
                    </div>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Registrar nuevo videojuego</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>