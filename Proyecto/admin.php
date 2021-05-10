<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Administracion</title>
    <?php include './inc/link.php'; ?>
    <link rel="stylesheet" href="./css/admin.css">
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>    
            <!-- Tab links -->
            <div class="tab">
            <button class="tablinks" onclick="SeleccionarPanel(event, 'Usuarios')">Usuarios</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'Procesador')">Procesador</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'Cajas')">Cajas</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'DiscosDuros')">DiscosDuros</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'MemoriasRAM')">MemoriasRAM</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'PlacasBases')">PlacasBases</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'TarjetasGraficas')">TarjetasGraficas</button>
            </div>

            <!-- Tab content -->
            <div id="Usuarios" class="tabcontent">
                <?php include './admin/AUsuarios.php'; ?>
            </div>

            <div id="Procesador" class="tabcontent">
                <?php include './admin/AProcesador.php'; ?>
            </div>

            <div id="Cajas" class="tabcontent">
                <?php include './admin/ACajas.php'; ?>
            </div>

            <div id="DiscosDuros" class="tabcontent">
                <?php include './admin/ADiscosDuros.php'; ?>
            </div>

            <div id="MemoriasRAM" class="tabcontent">
                <?php include './admin/AMemoriasRAM.php'; ?>
            </div>

            <div id="PlacasBases" class="tabcontent">
                <?php include './admin/APlacasBases.php'; ?>
            </div>

            <div id="TarjetasGraficas" class="tabcontent">
                <?php include './admin/ATarjetasGraficas.php'; ?>
            </div>

        </main>   
    <?php include './inc/footer.php'; ?>
    <script src="./js/admin.js"></script>
    <script src="./js/bootbox.min.js"></script>
</body>
</html>