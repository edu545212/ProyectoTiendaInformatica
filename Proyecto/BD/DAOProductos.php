<?php
    //funcion que se encarga de mostrar la tabla productos
    function infoProductos($conexion, $idProductos){
        $consulta = "SELECT * FROM Productos WHERE idProductos= '$idProductos'";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    //funcion que se usa en el carrousel y obtiene los datos de 3 productos aleatorios
    function infoProductosCarrousel($conexion){
        $consulta = "SELECT * FROM Productos ORDER BY rand() LIMIT 3";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

    //funcion que se usa en el carrousel y obtiene los datos de 3 productos aleatorios
    function UltimosProductosCarrousel($conexion){
        $consulta = "SELECT * FROM Productos ORDER BY idProductos DESC LIMIT 3";
        $resultado = mysqli_query($conexion, $consulta);
        return $resultado;
    }

?>