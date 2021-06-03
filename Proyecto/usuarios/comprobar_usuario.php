<?php

    require "../BD/conector_bd.php";
    require "../BD/DAOUsuario.php";
    
    define('CLAVE', '6LdRWgobAAAAAL_61aiRoATimeTS1D1Dr321Rw0d');

    
	$token = $_POST['token'];
	$action = $_POST['action'];
    $nusuario = $_POST["usuario"];
    $npassword = $_POST["password"];
	
	$cu = curl_init();
	curl_setopt($cu, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
	curl_setopt($cu, CURLOPT_POST, 1);
	curl_setopt($cu, CURLOPT_POSTFIELDS, http_build_query(array('secret' => CLAVE, 'response' => $token)));
	curl_setopt($cu, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($cu);
	curl_close($cu);
	
	$datos = json_decode($response, true);
	
	print_r($datos);

    if($datos['success'] == 1 && $datos['score'] >= 0.5){
		if($datos['action'] == 'validarUsuario'){

            //Creamos la conexión a la BD.
            $conexion = conectar(true);

            //Lanzamos la consulta.
            $consulta = consultaLogin($conexion, $nusuario, $npassword);

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
                    }
		
		} else {
		echo "ERES UN ROBOT";
	}
	
?>