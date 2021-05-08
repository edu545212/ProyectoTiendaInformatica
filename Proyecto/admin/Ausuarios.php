<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<section class="principal">

<h1>Usuario</h1>
<div>
    <a class="btn btn-success" href="./NuevoVC.php"> Nuevo <i class="fa fa-plus"></i></a>
</div>
<br>
<div class="formulario">
    <label for="caja_busqueda">Buscar</label>
    <input type="text" name="caja_busqueda" id="caja_busqueda"></input>

    
</div>

<div id="datos"></div>


</section>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/BusUsuario.js"></script>