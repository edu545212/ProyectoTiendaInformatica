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
            <div class="container-fluid">		
                <h2>TarjetasGraficas</h2>
                <?php
                include './BD/DAOTarjetasGraficas.php';
                $product = new TarjetasGraficas();	
                ?>	
                <div class="row">
                <div class="col-md-3">                      
                    <div class="list-group">
                        <h3>Marca</h3>
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
                    </div>
                    <div class="list-group">
                        <h3>Tipo</h3>
                        <div class="TipoSection">
                            <?php
                            $Tipo = $product->getTipo();
                            foreach($Tipo as $TipoDetails){	
                            ?>
                            <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Tipo" value="<?php echo $TipoDetails["Tipo"]; ?>"  > <?php echo $TipoDetails["Tipo"]; ?></label>
                            </div>
                            <?php }	?>
                        </div>
                    </div>
                    <div class="list-group">
                        <h3>Memoria</h3>
                        <div class="MemoriaSection">
                            <?php
                            $Memoria = $product->getMemoria();
                            foreach($Memoria as $MemoriaDetails){	
                            ?>
                            <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Memoria" value="<?php echo $MemoriaDetails["Memoria"]; ?>"  > <?php echo $MemoriaDetails["Memoria"]; ?></label>
                            </div>
                            <?php }	?>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                <br />
                    <div class="row searchResult">
                    </div>
                </div>
                </div>	
            </div>
        </main>
    <?php include './inc/footer.php'; ?>
    <script type="text/javascript" src="./js/jquery.min.js"></script>
    <script type="text/javascript" src="./js/Filtros/FiltroTarjetasGraficas.js"></script>
</body>
</html>