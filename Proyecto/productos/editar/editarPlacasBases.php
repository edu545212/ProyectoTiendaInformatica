<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOPlacasBases.php";

    //Recogemos los valores del formulario.
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Chipset = $_POST["Chipset"];
    $Forma = $_POST["Forma"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/PlacasBases";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarPlacasBasesNoImg($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarPlacasBases($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion, $nombreImg);
        mysqli_query($conexion, $insertar);
    }
    header ('Location: ../../admin.php');
?>