<?php
    session_start();
    if (!$_SESSION['Rol']=="usuario" || !$_SESSION['Rol']=="admin" ){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOUsuario.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Ajustes de usuario</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./usuarios/editar_usuario.php" id="loginform" onsubmit="return validarFormulario();">
                <div class="container row justify-content-center">

                    <h1 class="col-8 text-center">Ajustes de usuario</h1>

                    <?php
                        $conexion = conectar(true);
                        $idUsuario=($_SESSION['idUsuario']);
                        $consulta= EditarUsuarioFromulario($conexion, $idUsuario);
                        while($fila=mysqli_fetch_array($consulta)){
                    ?>

                    <div class="form-group col-8 col-md-5">
                        <label for="usuario" class="visually-hidden">Usuario</label>
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" value="<?php echo $fila['Usuario']?>" required readonly="readonly">
                        <span id="errorUsuario">Introduce un usuario valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="password" class="visually-hidden">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" value="<?php echo $fila['Password']?>" required>
                        <span id="errorPassword">La Contraseña debe tener al menos una mayuscula, una minuscula, numeros y caracteres especiales </span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Password2" class="visually-hidden">Repita Contraseña</label>
                        <input id="password2" type="password" class="form-control" name="password2" placeholder="Repita Contraseña" value="<?php echo $fila['Password']?>" required>
                        <span id="errorPassword2">Las contraseñas no coinciden</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="nombre" class="visually-hidden">Nombre</label>
                        <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $fila['Nombre']?>" required>
                        <span id="errorNombre">Introduce un nombre valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="apellido1" class="visually-hidden">Apellido 1</label>
                        <input id="apellido1" type="text" class="form-control" name="apellido1" placeholder="Apellido 1" value="<?php echo $fila['Apellido1']?>" required>
                        <span id="errorApellido1">Introduce un apellido valido</span>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="apellido2" class="visually-hidden">Apellido 2</label>
                        <input id="apellido2" type="text" class="form-control" name="apellido2" placeholder="Apellido 2" value="<?php echo $fila['Apellido2']?>" required>
                        <span id="errorApellido2">Introduce un apellido valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="DNI" class="visually-hidden">DNI</label>
                        <input id="DNi" type="text" class="form-control" name="DNI" placeholder="DNI" value="<?php echo $fila['DNI']?>" required>
                        <span id="errorDNi">Introduce un Dni valido (sin - y la letra mayuscula)</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Telefono" class="visually-hidden">Telefono</label>
                        <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $fila['Telefono']?>" required>
                        <span id="errorTelefono">Introduce un telefono valido</span> 
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="email" class="visually-hidden">Correo electronico</label>
                        <input id="email" type="email" class="form-control" name="email" placeholder="Correo electronico" value="<?php echo $fila['Email']?>" required>
                        <span id="errorEmail">Introduce un correo electronico valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">    
                        <label for="CP" class="visually-hidden">Codigo postal</label>
                        <input id="CP" type="CP" class="form-control" name="CP" placeholder="Codigo postal" value="<?php echo $fila['CP']?>" required >
                        <span id="errorCodigoPostal">Introduce un codigo postal valido</span>
                    </div>
                    
                    <div class="form-group col-8 col-md-5">
                        <label for="Provincia" class="visually-hidden">Provincia</label>
                        <input id="provincia" type="text" class="form-control" name="provincia" placeholder="Provincia" value="<?php echo $fila['Provincia']?>" required readonly="readonly">
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="CA" class="visually-hidden">Comunidad Autonoma</label>
                        <input id="CA" type="text" class="form-control" name="CA" placeholder="Comunidad Autonoma" value="<?php echo $fila['ComunidadAutonoma']?>" required readonly="readonly">
                    </div>

                    <div class="form-group col-8 col-md-10">
                        <label for="Direccion" class="visually-hidden">Dirección</label>
                        <input id="Direccion" type="text" class="form-control" name="Direccion" value="<?php echo $fila['Direccion']?>" placeholder="Direccion Numero y piso" required>
                    </div>

                    <?php 
                        }
                    ?>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Editar</button>
                    <p class="mt-5 mb-3 text-muted"></p>

                    <span class="col-12 text-center" id="errorFormulario">Rellena el formulario de manera correcta</span>
                </div>
            </form>
        </main>
        <script src="./js/registro.js"></script>
    <?php include './inc/footer.php'; ?>
</body>
</html>