<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOTarjetasGraficas.php";
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <title>Comparativas TarjetasGraficas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comparativas</li>
        </ol>
    </nav>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./infoCompTarjetasGraficas.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">
                    <h1 class="col-8 text-center">Comparativas de TarjetasGraficas</h1>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compTarjetasGraficas($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="TarjetasGraficas1">TarjetasGraficas 1</label>
                        <select class="custom-select my-1 mr-sm-2" id="TarjetasGraficas1" name="TarjetasGraficas1">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idTarjetasGraficas'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        $consulta= compTarjetasGraficas($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="TarjetasGraficas2">TarjetasGraficas 2</label>
                        <select class="custom-select my-1 mr-sm-2" id="TarjetasGraficas2" name="TarjetasGraficas2">
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