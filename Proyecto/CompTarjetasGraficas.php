<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOTarjetasGraficas.php";
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Comparativas Tarjetas Graficas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Nuevo_videojuegoyplataforma.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">
                    <h1 class="col-8 text-center">Comparativas de Tarjetas Graficas</h1>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compTarjetasGraficas($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="TarjetasGraficas" class="visually-hidden">Tarjetas Graficas 1</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="TarjetasGraficas">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idTarjetasGraficas'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compTarjetasGraficas($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="TarjetasGraficas" class="visually-hidden">Tarjetas Graficas 2</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="TarjetasGraficas">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idTarjetasGraficas'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Comparar TarjetasGraficas</button>
                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>