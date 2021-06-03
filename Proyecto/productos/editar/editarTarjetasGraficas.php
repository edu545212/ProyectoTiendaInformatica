<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOTarjetasGraficas.php";

    //Recogemos los valores del formulario.
    $idTarjetasGraficas=$_POST['idTarjetasGraficas'];
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Memoria = $_POST["Memoria"];
    $Benchmark = $_POST["Benchmark"];
    $Tipo = $_POST["Tipo"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/TarjetasGraficas";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarTarjetasGraficasNoImg($conexion, $Nombre, $Marca, $Memoria, $Benchmark, $Tipo, $Stock, $Precio, $Descripcion, $idTarjetasGraficas);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarTarjetasGraficas($conexion, $Nombre, $Marca, $Memoria, $Benchmark, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idTarjetasGraficas);
        mysqli_query($conexion, $insertar);
    }
    header ('Location: ../../admin.php');
?>