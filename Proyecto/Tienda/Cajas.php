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
                include 'class/Product.php';
                $product = new Product();	
            ?>

            <div class="row">
                <!--Categorias-->
                <div class="col-md-3">    
                    <div class="list-group">
                        <h3>Precio</h3>	
                        <div class="list-group-item">
                            <input id="priceSlider" data-slider-id='ex1Slider' type="text" data-slider-min="1000" data-slider-max="65000" data-slider-step="1" data-slider-value="14"/>
                            <div class="priceRange">1000 - 65000</div>
                            <input type="hidden" id="minPrice" value="0" />
                            <input type="hidden" id="maxPrice" value="65000" />                  
                        </div>			
                    </div>

                    <div class="list-group">
                        <h3>Marca</h3>
                        <div class="brandSection">
                            <?php
                                $brand = $product->getBrand();
                                foreach($brand as $brandDetails){	
                            ?>
                            <div class="list-group-item checkbox">
                                <label><input type="checkbox" class="productDetail brand" value="<?php echo $brandDetails["brand"]; ?>"  > <?php echo $brandDetails["brand"]; ?></label>
                            </div>
                            <?php }	?>
                        </div>
                    </div>

                    <div class="list-group">
                        <h3>RAM</h3>
                        <?php			
                        $ram = $product->getRam();
                        foreach($ram as $ramDetails){	
                        ?>
                        <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="productDetail ram" value="<?php echo $ramDetails['ram']; ?>" > <?php echo $ramDetails['ram']; ?> GB</label>
                        </div>
                        <?php    
                        }
                        ?>
                    </div>

                    <div class="list-group">
                        <h3>Almacenamiento interno</h3>
                        <?php
                            $storage = $product->getStorage();
                            foreach($storage as $storageDetails){	
                        ?>
                        <div class="list-group-item checkbox">
                            <label><input type="checkbox" class="productDetail storage" value="<?php echo $storageDetails['storage']; ?>"  > <?php echo $storageDetails['storage']; ?> GB</label>
                        </div>
                        <?php } ?> 
                        
                    </div>
                </div>
                
                <!--listas-->
                <div class="col-md-9">
                    <br />
                    <div class="row searchResult">

                    </div>
                </div>

            </div>	
        </main>
    <?php include './inc/footer.php'; ?>
</body>
</html>