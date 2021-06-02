<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAODiscosDuros.php";

    //Recogemos los valores del formulario.
    $idDiscosDuros=$_POST['idDiscosDuros'];
    $Nombre = $_POST["Nombre"];
    $Marca = $_POST["Marca"];
    $Capacidad = $_POST["Capacidad"];
    $Tipo = $_POST["Tipo"];
    $Stock = $_POST["Stock"];
    $Precio = $_POST["Precio"];
    $Descripcion = $_POST["Descripcion"];

    //imagen
    $nombreImg = $_FILES['imagen']['name'];
    $archivoImg = $_FILES['imagen']['tmp_name'];
    $rutaImg ="../../img/DiscosDuros";
    $rutaImg =$rutaImg."/".$nombreImg;

    move_uploaded_file($archivoImg,$rutaImg);

    $conexion = conectar(true);
    if(empty($archivoImg)) {
        $insertarnoimg = editarDiscosDurosNoImg($conexion, $Nombre, $Marca, $Capacidad, $Tipo, $Stock, $Precio, $Descripcion, $idDiscosDuros);
        mysqli_query($conexion, $insertarnoimg);
    } else {
        $insertar = editarDiscosDuros($conexion, $Nombre, $Marca, $Capacidad, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idDiscosDuros);
        mysqli_query($conexion, $insertar);
    }
    header ('Location: ../../admin.php');
?>