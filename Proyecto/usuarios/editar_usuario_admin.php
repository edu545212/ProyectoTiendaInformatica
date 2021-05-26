<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOUsuario.php";

    //Recogemos los valores del formulario.
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $DNI = $_POST["DNI"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $CP = $_POST["CP"];
    $provincia = $_POST["provincia"];
    $CA = $_POST["CA"];
    $ROL = $_POST['ROL'];
    $Direccion = $_POST['Direccion'];

    $conexion = conectar(true);

    //comprobamos si el usuario ha rellenado todos los campos
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['password2'] == '' or $_POST['nombre'] == '' or $_POST['apellido1'] == '' 
    or $_POST['apellido2'] == '' or $_POST['DNI'] == '' or $_POST['telefono'] == '' or $_POST['CP'] == '' or $_POST['provincia'] == '' or $_POST['CA'] == '' or $_POST['ROL'] == '') {
        echo'<script type="text/javascript">
        alert("Rellene todos los campos");
        window.location.href="../admin.php";
        </script>';

    } else {
        $insertar = EditarUsuarioAdmin($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $ROL, $Direccion);
        mysqli_query($conexion, $insertar);
        header ('Location: ../admin.php');
    }
?>