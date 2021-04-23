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
    $Direccion = $_POST['Direccion'];

    //Creamos la conexión a la BD.
    $conexion = conectar(true);

    //comprobamos si el usuario ha rellenado todos los campos
    if($_POST['usuario'] == '' or $_POST['password'] == '' or $_POST['password2'] == '' or $_POST['nombre'] == '' or $_POST['apellido1'] == '' 
        or $_POST['apellido2'] == '' or $_POST['DNI'] == '' or $_POST['telefono'] == '' or $_POST['CP'] == '' or $_POST['provincia'] == '' or $_POST['CA'] == '') {
            echo'<script type="text/javascript">
            alert("Rellene todos los campos");
            window.location.href="../registro.php";
            </script>';

    } else {
        //lanzamos la consulta para saber si existe el usuario, email o contraseña
        $consultaUsuario = consultarUsuarios($conexion, $usuario);
        $consultaEmail = consultarCorreo($conexion, $email);
        $consultaDni = consultarDni($conexion, $DNI);

        if(mysqli_num_rows($consultaUsuario) == 1){
            echo'<script type="text/javascript">
            alert("Ese usuario ya existe");
            window.location.href="../recuperar_contraseña.php";
            </script>';
        } elseif(mysqli_num_rows($consultaEmail) == 1){
            echo'<script type="text/javascript">
            alert("Ese email ya existe");
            window.location.href="../recuperar_contraseña.php";
            </script>';
        } elseif(mysqli_num_rows($consultaDni) == 1){
            echo'<script type="text/javascript">
            alert("Ese DNI ya existe");
            window.location.href="../recuperar_contraseña.php";
            </script>';
        } else {
            $insertar = insertarUsuarios($conexion, $usuario, $password, $nombre, $apellido1, $apellido2, $telefono, $email, $CP, $provincia, $CA, $DNI, $Direccion);
            mysqli_num_rows($insetar);
            header ('Location: ../login.php');
        }
    }

?>