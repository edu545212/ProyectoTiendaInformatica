<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<section class="principal">
    <h1>TarjetasGraficas</h1>

    <div>
        <a class="btn btn-success" href="./NuevoTJ.php"> Nuevo <i class="fa fa-plus"></i></a>
    </div>
    <br>

    <!--Caja de busqueda-->
    <div class="formulario">
        <label for="caja_busqueda_TarjetasGraficas">Buscar</label>
        <input type="text" name="caja_busqueda_TarjetasGraficas" id="caja_busqueda_TarjetasGraficas"></input>
    </div>

    <!--Tabla-->
    <div id="datosTarjetasGraficas"></div>
</section>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/BusTarjetasGraficas.js"></script>