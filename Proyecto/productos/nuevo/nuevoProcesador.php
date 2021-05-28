<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOProcesador.php";

    //Recogemos los valores del formulario.
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Soket = $_POST["Soket"];
    $benchmark = $_POST["benchmark"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/Procesadores";
    $rutaImg =$rutaImg."/".$nombreImg;
    
    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);

    //lanzamos la consulta para saber si existe el usuario, email o contraseña
    $consultaNombre = consultaNombre($conexion, $Nombre);

    if(mysqli_num_rows($consultaNombre) == 1){
        echo'<script type="text/javascript">
        alert("Ese nombre ya existe");
        window.location.href="../../admin.php";
        </script>';
    } else {
        $insertar = nuevoProcesador($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $nombreImg);
        mysqli_query($conexion, $insertar);
        header ('Location: ../../admin.php');
    }
?>