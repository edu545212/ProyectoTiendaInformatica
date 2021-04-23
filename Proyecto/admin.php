<?php
    session_start();
    if (!$_SESSION['Rol']=="admin"){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<?php
    require "./BD/conector_bd.php";
    require "./BD/DAOPlataforma.php";
    require "./BD/DAOUsuario.php";
    require "./BD/DAOVideojuegos.php";

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
            <button class="tablinks" onclick="SeleccionarPanel(event, 'VideojuegosYPlataforma')">Videojuegos Y Plataforma</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'Videojuegos')">Videojuegos</button>
            <button class="tablinks" onclick="SeleccionarPanel(event, 'Videoconsolas')">Videoconsolas</button>
            </div>

            <!-- Tab content -->
            <div id="Usuarios" class="tabcontent">
                <?php include './admin/Ausuarios.php'; ?>
            </div>

            <div id="VideojuegosYPlataforma" class="tabcontent">
                <?php include './admin/AvideojuegosYplataforma.php'; ?>
            </div>

            <div id="Videojuegos" class="tabcontent">
                <?php include './admin/Avideojuegos.php'; ?>
            </div>

            <div id="Videoconsolas" class="tabcontent">
                <?php include './admin/Avideoconsolas.php'; ?>
            </div>

        </main>   
    <?php include './inc/footer.php'; ?>
    <script src="./js/admin.js"></script>
    <script src="./js/bootbox.min.js"></script>
</body>
</html>