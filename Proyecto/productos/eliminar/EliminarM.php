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
    require "../../BD/DAOMemoriasRAM.php";
    $conexion = conectar(true);
    $id = $_GET['idMemoriasRAM'];
    $sql = eliminarMemoriasRAM($conexion, $id);
    mysqli_num_rows($sql);	
    header ('Location: ../../admin.php');
?>