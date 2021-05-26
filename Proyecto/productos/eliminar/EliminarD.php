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
    require "../../BD/DAODiscosDuros.php";
    $conexion = conectar(true);
    $id = $_GET['idDiscosDuros'];
    $sql = eliminarDiscosDuros($conexion, $id);
    mysqli_num_rows($sql);	
    header ('Location: ../../admin.php');
?>