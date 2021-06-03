<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOMemoriasRAM.php";

    //Recogemos los valores del formulario.
    $idMemoriasRAM=$_POST['idMemoriasRAM'];
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Almacenamiento = $_POST["Almacenamiento"];
    $Formato = $_POST["Formato"];
    $Tipo = $_POST["Tipo"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/MemoriasRAM";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarMemoriasRAMNoImg($conexion, $Nombre, $Marca, $Almacenamiento, $Formato, $Tipo, $Stock, $Precio, $Descripcion, $idMemoriasRAM);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarMemoriasRAM($conexion, $Nombre, $Marca, $Almacenamiento, $Formato, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idMemoriasRAM);
        mysqli_query($insertar);
    }
    header ('Location: ../../admin.php');
?>