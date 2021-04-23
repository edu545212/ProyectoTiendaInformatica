<?php
    require "../BD/conector_bd.php";
    require "../BD/DAOUsuario.php";
    
    //Recogemos los valores del formulario.
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];
    $dni = $_POST["DNI"];

    //Creamos la conexión a la BD.
    $conexion = conectar(true);

    //comprobamos si el usuario ha rellenado todos los campos
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['password2'] == '' or $_POST['DNI'] == '') { 
        echo'<script type="text/javascript">
        alert("rellene todos los campos");
        window.location.href="../recuperar_contraseña.php";
        </script>';
    } else {
        //lanzamos la consulta para saber si existe el usuario, email o contraseña
        $consultaRecuperar = consultarRuperar($conexion, $usuario, $dni);

        if(mysqli_num_rows($consultaRecuperar) == 1){
            $consulta = modifcarContraseña($conexion, $usuario, $password, $dni);
            if(mysqli_num_rows($consultaRecuperar) == 1){
                header ('Location: ../login.php');
            } else {
                echo'<script type="text/javascript">
                alert("Ha ocurrido un error");
                window.location.href="../recuperar_contraseña.php";
                </script>';
            }
        } else {
            echo'<script type="text/javascript">
            alert("El usuario y o DNI no coinciden");
            window.location.href="../recuperar_contraseña.php";
            </script>';
        }
    }
?>