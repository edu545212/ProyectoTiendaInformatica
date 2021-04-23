<?php

require "../BD/conector_bd.php";
require "../BD/DAOUsuario.php";

//Recogemos los valores del formulario.
$usuario = $_POST["usuario"];
$password = $_POST["password"];

//Creamos la conexión a la BD.
$conexion = conectar(true);

//Lanzamos la consulta.
$consulta = consultaLogin($conexion, $usuario, $password);

if(mysqli_num_rows($consulta) == 1){

    $fila = mysqli_fetch_assoc($consulta);

    //Creo la sesión del usuario.
    crearSesion($fila);

    //vamos a mostrar los datos del usuario
    header('Location: ../index.php');

} else{
    //lanzamos la consulta para saber si existe el usuario
    $consultaUsuario = consultarUsuarios($conexion, $usuario);

    if(mysqli_num_rows($consultaUsuario) == 1){
        header ('Location: ../recuperar_contraseña.php');
    } else {
        header ('Location: ../registro.php');
    }
}
?>