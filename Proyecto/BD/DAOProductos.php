<?php
    function infoProductos($conexion, $idProductos){
        $consulta = "SELECT * FROM Productos WHERE idProductos= '$idProductos'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

?>