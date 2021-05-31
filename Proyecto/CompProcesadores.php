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
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./admin/Nuevo_videojuegoyplataforma.php" id="loginform" enctype="multipart/form-data">
                <div class="container row justify-content-center">
                    <h1 class="col-8 text-center">Comparativas de procesadores</h1>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compProcesadores($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="Procesadores" class="visually-hidden">Procesador 1</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Procesador">
                            <?php 
                                while($fila=mysqli_fetch_array($consulta)){
                                    echo '<option value='.$fila['idProcesador'].'>'.$fila['Nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        $conexion = conectar(true);
                        //Lanzamos la consulta
                        $consulta= compProcesadores($conexion);
                    ?>
                    <div class="form-group col-8 col-md-5">
                        <label for="Procesadores" class="visually-hidden">Procesador 2</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="Procesador">
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