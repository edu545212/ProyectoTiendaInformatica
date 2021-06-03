<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOComentarios.php";

    //Recogemos los valores del formulario.
    $idUsuario = $_POST["idUsuario"];
    $idProducto= $_POST["idProducto"];
    $Comentario = $_POST["Comentario"];
    $Valoracion = $_POST["Valoracion"];

    $conexion = conectar(true);

    $insertar = NuevoComentario($conexion, $idUsuario, $idProducto, $Comentario, $Valoracion);
    mysqli_query($conexion, $insertar);
    header ("Location: ../../infoProductos.php?idProductos=".urlencode($idProducto));
?>