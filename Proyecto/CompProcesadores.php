<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <?php include './inc/nav.php'; ?>
        <main>
            <?php
                include './BD/DAOProcesador.php';
                $product = new Procesador();	
            ?>
            <div class="MarcaSection">
                <?php
                $Marca = $product->getMarca();
                foreach($Marca as $MarcaDetails){	
                ?>
                <div class="list-group-item checkbox">
                <label><input type="checkbox" class="productDetail Marca" value="<?php echo $MarcaDetails["Marca"]; ?>"  > <?php echo $MarcaDetails["Marca"]; ?></label>
                </div>
                <?php }	?>
            </div>
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>