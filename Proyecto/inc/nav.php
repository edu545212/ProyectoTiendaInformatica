<?php 
    session_start(); 
    error_reporting(0);
?>

<nav class="navbar navbar-expand-md navbar-light bg-info fixed-top" id="navbar">
    <a href="index.php" class="navbar-brand">
        <img src="https://cdn4.dibujos.net/dibujos/pintar/leon-tribal.png" height="28" alt="León S.L">
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav">
            <a href="index.php" class="nav-item nav-link">Inicio</a>
            <a href="comparativas.php" class="nav-item nav-link">Comparativas</a>
            <a href="tienda.php" class="nav-item nav-link">Tienda Online</a>
        </div>
        <div class="navbar-nav ml-auto">    
            <?php   
                    if($_SESSION['Rol']=="admin"){
                        echo ' 
                        <a href="carrito.php" class="nav-item nav-link">
                            <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Carrito
                        </a>
                        <a href="admin.php" class="nav-item nav-link">
                            <i class="fa fa-cog"></i>&nbsp;&nbsp;Administracion
                        </a>
                        <a href="ajustes_usuario.php?idUsuario='.$_SESSION['idUsuario'].'" class="nav-item nav-link">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['Usuario'].'
                        </a>
                        <a href="./usuarios/desloguear_usuario.php" class="nav-item nav-link">
                            <i class="fa fa-sign-out"></i>
                        </a>
                        ';
                    }else if($_SESSION['Rol']=="usuario"){
                        echo ' 
                            <a href="carrito.php" class="nav-item nav-link">
                            <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Carrito
                            </a>
                            <a href="ajustes_usuario.php?idUsuario='.$_SESSION['idUsuario'].'" class="nav-item nav-link">
                            <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['Usuario'].'
                            </a>
                            <a href="./usuarios/desloguear_usuario.php" class="nav-item nav-link">
                            <i class="fa fa-sign-out"></i>
                            </a>
                        ';
                    }else{
                        echo ' 

                        <a href="registro.php" class="nav-item nav-link">Registro</a>
                            <a href="login.php" class="nav-item nav-link">
                                <i class="fa fa-user"></i>&nbsp;&nbsp;Login
                            </a>
                        ';
                    }
                ?>
        </div>
    </div>
</nav>