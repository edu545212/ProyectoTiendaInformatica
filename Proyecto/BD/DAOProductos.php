<?php
    function infoProductos($conexion, $idProductos){
        $consulta = "SELECT * FROM Productos WHERE idProductos= '$idProductos'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    function infoProductosCarrousel($conexion){
        $consulta = "SELECT * FROM Productos ORDER BY rand() LIMIT 3";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

?>