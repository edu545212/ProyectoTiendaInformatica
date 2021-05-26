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
    require "../../BD/DAOPlacasBases.php";
    $conexion = conectar(true);
    $id = $_GET['idPlacasBases'];
    $sql = eliminarPlacasBases($conexion, $id);
    mysqli_num_rows($sql);	
    header ('Location: ../../admin.php');
?>