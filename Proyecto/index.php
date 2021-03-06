<?php
	require "./BD/conector_bd.php";
    require "./BD/DAOProductos.php";
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Lion's Store</title>
        <?php include './inc/link.php'; ?>
    </head>
    <body>
        <div id="loader-wrapper">
            <div id="loader"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
        </div>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
            </ol>
        </nav>
        <?php include './inc/nav.php'; ?>
            <main>
                <div class="container-fluid row justify-content-center">
                    <!--Productos-->
                    <div class="col-xl-5">
                        <h1>Productos</h1>
                        <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>
                            <div class="carousel-inner">
                                <?php
                                    $conexion = conectar(true);
                                    $consulta = infoProductosCarrousel($conexion);
                                    $i = 0;
                                    while($fila = mysqli_fetch_assoc($consulta))
                                    {
                                ?>
                                <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
                                    <a href="infoProductos.php?idProductos=<?php echo $fila['idProductos'];?>"><img src="./img/<?php echo $fila['Categoria'];?>/<?php echo $fila['Imagen'];?>" alt="Productos" style="width:100%; height:500px;"></a>
                                </div>
                                <?php
                                        $i++;
                                    }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>

                    <!--Ultimos Productos-->
                    <div class="col-xl-5">
                        <h1>Ultimos Productos</h1>
                        <div id="demo2" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            <li data-target="#demo2" data-slide-to="0" class="active"></li>
                            <li data-target="#demo2" data-slide-to="1"></li>
                            <li data-target="#demo2" data-slide-to="2"></li>
                        </ul>
                            <div class="carousel-inner">
                                <?php
                                    $conexion = conectar(true);
                                    $consulta = UltimosProductosCarrousel($conexion);
                                    $i = 0;
                                    while($fila = mysqli_fetch_assoc($consulta))
                                    {
                                ?>
                                <div class="carousel-item <?php echo ($i == 0) ? 'active' : '';?>">
                                    <a href="infoProductos.php?idProductos=<?php echo $fila['idProductos'];?>"><img src="./img/<?php echo $fila['Categoria'];?>/<?php echo $fila['Imagen'];?>" alt="Productos" style="width:100%; height:500px;"></a>
                                </div>
                                <?php
                                        $i++;
                                    }
                                ?>
                            </div>
                            <a class="carousel-control-prev" href="#demo2" data-slide="prev">
                                <span class="carousel-control-prev-icon"></span>
                            </a>
                            <a class="carousel-control-next" href="#demo2" data-slide="next">
                                <span class="carousel-control-next-icon"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        <?php include './inc/footer.php'; ?>
    </body>
</html>