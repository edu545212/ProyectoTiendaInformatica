<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOProcesador.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Comparativas Procesador</title>
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
            <form name="formulario" method="post" action="./infoCompProcesadores.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">
                    <h1 class="col-8 text-center">Comparativas de procesadores</h1>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compProcesadores($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="Procesador1">Procesador 1</label>
                        <select class="custom-select my-1 mr-sm-2" id="Procesador1" name="Procesador1">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idProcesador'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        $consulta= compProcesadores($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="Procesador2">Procesador 2</label>
                        <select class="custom-select my-1 mr-sm-2" id="Procesador2" name="Procesador2">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idProcesador'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Comparar procesadores</button>
                </div>
            </form>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>