<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: ../index.php');
        exit;
    }
?>
<section class="principal">
    <h1>MemoriasRAM</h1>

    <div>
        <a class="btn btn-success" href="./NuevoM.php"> Nuevo <i class="fa fa-plus"></i></a>
    </div>
    <br>

    <div class="formulario">
        <label for="caja_busqueda_MemoriasRAM">Buscar</label>
        <input type="text" name="caja_busqueda_MemoriasRAM" id="caja_busqueda_MemoriasRAM"></input>
    </div>

    <div id="datosMemoriasRAM"></div>
</section>

<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/BusMemoriasRAM.js"></script>