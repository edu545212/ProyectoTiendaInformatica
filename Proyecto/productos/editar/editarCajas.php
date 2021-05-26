<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOCajas.php";

    //Recogemos los valores del formulario.
    $idCajas=$_POST['idCajas'];
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Tipo = $_POST["Tipo"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/Cajas";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarCajasNoImg($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $idCajas);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarCajas($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idCajas);
        mysqli_query($conexion, $insertar);
    }
    header ('Location: ../../admin.php');
?>