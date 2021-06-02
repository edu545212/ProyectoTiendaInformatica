<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Mapa del sitio</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mapa del sitio</li>
        </ol>
    </nav>
    <?php include './inc/nav.php'; ?>
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <h3>Usurios e Index</h3>
                        <?php   
                            if($_SESSION['Rol']=="admin"){
                                echo ' 
                                <a href="index.php">Index</a><br>
                                <a href="Carrito.php">Carrito</a><br>
                                <a href="Admin.php">Panel de admin</a><br>
                                <a href="ajustes_usuario.php?idUsuario='.$_SESSION['idUsuario'].'">Ajustes de usuario</a><br>
                                <a href="./usuarios/desloguear_usuario.php">Desloguear usuario</a><br>
                                ';
                            }else if($_SESSION['Rol']=="usuario"){
                                echo '
                                <a href="index.php">Index</a><br>
                                <a href="Carrito.php">Carrito</a><br>
                                <a href="ajustes_usuario.php?idUsuario='.$_SESSION['idUsuario'].'">Ajustes de usuario</a><br>
                                <a href="./usuarios/desloguear_usuario.php">Desloguear usuario</a><br>
                                ';
                            }else{
                                echo '
                                <a href="index.php">Index</a><br>
                                <a href="Registro.php">Registro</a><br>
                                <a href="login.php">Login</a><br>
                                ';
                            }
                        ?>
                    </div>
                    <div class="col-sm">
                        <h3>Comparativas</h3>
                        <a href="CompProcesadores.php">Comparativas de Procesadores</a><br>
                        <a href="CompTarjetasGraficas.php">Comparativas de Tarjetas Graficas</a><br>
                    </div>
                    <div class="col-sm">
                        <h3>Catalogo</h3>
                        <a href="Cajas.php">Cajas</a><br>
                        <a href="DiscosDuros.php">Discos Duros</a><br>
                        <a href="TarjetasGraficas.php">Tarjetas Graficas</a><br>
                        <a href="PlacasBases.php">PlacasBases</a><br>
                        <a href="Procesadores.php">Procesadores</a><br>
                    </div>
                </div>
            </div>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>