<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOProcesador.php";

    //Recogemos los valores del formulario.
    $idProcesador=$_POST['idProcesador'];
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
    $rutaImg ="../../img/Procesador";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarProcesadorNoImg($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $idProcesador);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarProcesador($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $nombreImg, $idProcesador);
        mysqli_query($conexion, $insertar);
    }
    header ('Location: ../../admin.php');
?>