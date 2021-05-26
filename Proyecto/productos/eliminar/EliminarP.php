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
    require "../../BD/DAOProcesador.php";

    $conexion = conectar(true);
    $id = $_GET['idProcesador'];
    $sql = eliminarProcesador($conexion, $id);
    mysqli_query($conexion, $sql);	
    header ('Location: ../../admin.php');
?>