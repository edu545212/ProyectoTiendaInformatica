<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOTarjetasGraficas.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Info comparativas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item"><a href="CompTarjetasGraficas.php">Comparativas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Info Comparativas</li>
        </ol>
    </nav>
    <?php include './inc/nav.php'; ?>
        <main>
            <div class="container-fluid row justify-content-center">
                <?php
                    $conexion = conectar(true);
                    //Lanzamos la consulta
                    $TarjetasGraficas1 = $_POST["TarjetasGraficas1"];
                    $consulta= editarTarjetasGraficasFormulario($conexion, $TarjetasGraficas1);
                    while($fila=mysqli_fetch_array($consulta)){
                ?>
                <div class="card col-12 col-md-5 mx-1 my-1">
                    <img class="card-img-top mx-1 my-4" src="./img/TarjetasGraficas/<?php echo $fila['Imagen'];?>" class="img-fluid">
                    <div class="card-body">
                        <h4 class="card-title text-center"><?php echo $fila['Nombre']; ?></h4>
                        <p class="card-text text-center">Precio: <?php echo $fila['Precio']; ?>€</p>
                        <p class="card-text text-center">Benchmark: <?php echo $fila['Benchmark']; ?> Puntos</p>
                        <p class="text-center">
                            <a href="infoProductos.php?idProductos=<?php echo $fila['idProductos']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                        </p>
                    </div>
                </div>
                <?php
                    }
                ?>
                <img src="./img/versus.png" alt="versus" width="10%" height="10%" class="col-md-1  align-self-center">
                <?php
                    $TarjetasGraficas2 = $_POST["TarjetasGraficas2"];
                    $consulta= editarTarjetasGraficasFormulario($conexion, $TarjetasGraficas2);
                    while($fila=mysqli_fetch_array($consulta)){
                ?>
                <div class="card col-12 col-md-5 mx-1 my-1">
                    <img class="card-img-top mx-1 my-4" src="./img/TarjetasGraficas/<?php echo $fila['Imagen'];?>" class="img-fluid">
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title text-center"><?php echo $fila['Nombre']; ?></h4>
                        <p class="card-text text-center">Precio: <?php echo $fila['Precio']; ?>€</p>
                        <p class="card-text text-center">Benchmark: <?php echo $fila['Benchmark']; ?> Puntos</p>
                        <p class="text-center mt-auto">
                            <a href="infoProductos.php?idProductos=<?php echo $fila['idProductos']; ?>" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
                        </p>
                    </div>
                </div>
                <?php
                    }
                ?>
                
            </div>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>