<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../../index.php');
        exit;
    }
?>
<?php
    require "../../BD/conector_bd.php";
    require "../../BD/DAOComentarios.php";
    $conexion = conectar(true);
    $idProducto = $_GET['idProducto'];
    $id = $_GET['idComentarios'];
    $sql = EliminarComentario($conexion, $id);
    mysqli_num_rows($sql);	
    header ("Location: ../../infoProductos.php?idProductos=".urlencode($idProducto));
?>