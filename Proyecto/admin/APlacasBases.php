<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<section class="principal">
    <h1>PlacasBases</h1>

    <div>
        <a class="btn btn-success" href="./NuevoPB.php"> Nuevo <i class="fa fa-plus"></i></a>
    </div>
    <br>

    <!--Caja de busqueda-->
    <div class="formulario">
        <label for="caja_busqueda_PlacasBases">Buscar</label>
        <input type="text" name="caja_busqueda_PlacasBases" id="caja_busqueda_PlacasBases"></input>
    </div>

    <!--Tabla-->
    <div id="datosPlacasBases"></div>
</section>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/BusPlacasBases.js"></script>