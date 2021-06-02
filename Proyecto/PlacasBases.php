<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Placas Bases</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tienda</li>
        </ol>
    </nav>
    <?php include './inc/nav.php'; ?>
        <main>
            <div class="container-fluid">		
                <h2>Placas Bases</h2>
                <?php
                include './BD/DAOPlacasBases.php';
                $product = new PlacasBases();	
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
                        <h3>Chipset</h3>
                        <div class="ChipsetSection">
                            <?php
                            $Chipset = $product->getChipset();
                            foreach($Chipset as $ChipsetDetails){	
                            ?>
                            <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Chipset" value="<?php echo $ChipsetDetails["Chipset"]; ?>"  > <?php echo $ChipsetDetails["Chipset"]; ?></label>
                            </div>
                            <?php }	?>
                        </div>
                    </div>
                    <div class="list-group">
                        <h3>Forma</h3>
                        <div class="FormaSection">
                            <?php
                            $Forma = $product->getForma();
                            foreach($Forma as $FormaDetails){	
                            ?>
                            <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail Forma" value="<?php echo $FormaDetails["Forma"]; ?>"  > <?php echo $FormaDetails["Forma"]; ?></label>
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
    <script type="text/javascript" src="./js/Filtros/FiltroPlacasBases.js"></script>
</body>
</html>