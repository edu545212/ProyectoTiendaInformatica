<?php
    session_start();
    if ($_SESSION['Rol']=="usuario" || $_SESSION['Rol']=="admin" ){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Consolas</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <form name="formulario" method="post" action="./usuarios/recuperar_contraseña.php" id="loginform" onsubmit="return validar();">
                <div class="container row justify-content-center">

                    <h1 class="col-8 d-flex justify-content-center">Recuperar contraseña</h1>

                    <div class="form-group col-8 col-md-5">
                        <label for="usuario" class="visually-hidden">Usuario</label>
                        <input id="usuario" type="text" class="form-control" name="usuario" placeholder="Nombre de usuario" required>
                        <span id="errorUsuario">Introduce un usuario valido</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="DNI" class="visually-hidden">DNI</label>
                        <input id="DNI" type="text" class="form-control" name="DNI" placeholder="DNI" required>
                        <span id="errorDNi">Introduce un Dni valido (sin - y la letra mayuscula)</span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="password" class="visually-hidden">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" placeholder="Contraseña" required>
                        <span id="errorPassword">La Contraseña debe tener al menos una mayuscula, una minuscula, numeros y caracteres especiales </span>
                    </div>

                    <div class="form-group col-8 col-md-5">
                        <label for="Password2" class="visually-hidden">Repita Contraseña</label>
                        <input id="password2" type="password" class="form-control" name="password2" placeholder="Repita Contraseña" required>
                        <span id="errorPassword2">Las contraseñas no coinciden</span>
                    </div>

                    <button class="col-5 col-md-4 btn btn-primary" type="submit">Recuperar contraseña</button>
                    <p class="mt-5 mb-3 text-muted"></p>
                    
                    <span class="col-12 text-center" id="errorFormulario">Rellena el formulario de manera correcta</span>
                </div>
            </form>
        </main>
        <script src="./js/recuperar_contraseña.js"></script>
    <?php include './inc/footer.php'; ?>
</body>
</html>