<?php
    session_start();
    if (!$_SESSION['Rol']=="usuario" || !$_SESSION['Rol']=="admin" ){
        //Si el usuario ya esta logueado
        header ('Location: index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Carrito</title>
    <?php include './inc/link.php'; ?>
</head>
<body>
    <script src="https://www.paypal.com/sdk/js?client-id=Ad8b1vLxVFIYHrQ8WJbo4oVTfVBUOqx3NuCzSp5k6ifO8rkKnV6MUw82qX4geSH7mb11A8kU4Z6iMOiL&currency=EUR">
    </script>
    <?php include './inc/nav.php'; ?>
        <main>
        <?php 
            require "./BD/base_de_datos.php";
            $sentencia = $base_de_datos->query("SELECT * FROM Productos;");
            $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
            ?>
            <!-- carrito donde se guardan los productos -->
            <?php 
            if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
            $granTotal = 0;
            ?>
                <div class="container-fluid bg-3 text-center">
                    <h1>Carrito de la compra</h1>
                    <!--Mensajes que muestra el carrito-->
                    <?php
                        if(isset($_GET["status"])){
                            if($_GET["status"] === "1"){
                                unset($_SESSION['carrito']);
                                ?>
                                    <div class="alert alert-success">
                                        <strong>Venta realizada correctamente</strong>
                                    </div>
                                <?php
                            }else if($_GET["status"] === "2"){
                                ?>
                                <div class="alert alert-info">
                                        <strong>Venta cancelada</strong>
                                    </div>
                                <?php
                            }else if($_GET["status"] === "3"){
                                ?>
                                <div class="alert alert-info">
                                        <strong>Producto(s) quitado(s) de la lista</strong>
                                    </div>
                                <?php
                            }else if($_GET["status"] === "4"){
                                ?>
                                <div class="alert alert-warning">
                                        <strong>Error:</strong> El producto que buscas no existe
                                    </div>
                                <?php
                            }else if($_GET["status"] === "5"){
                                ?>
                                <div class="alert alert-danger">
                                        <strong>Error: </strong>El producto está agotado
                                    </div>
                                <?php
                            }else{
                                ?>
                                <div class="alert alert-danger">
                                        <strong>Error:</strong> Algo salió mal mientras se realizaba la venta
                                    </div>
                                <?php
                            }
                        }
                    ?>
                    <br><br>

                    <!-- Generamos una tabla que muestre productos -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre </th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th>Quitar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Bucle que recorrer la sesion carrito y la asocia a un variable que 
                            guarda la informacion de un producto y añadimos una sumatoria final para el recuento -->
                            <?php foreach($_SESSION["carrito"] as $indice => $producto){ 
                                    $granTotal += $producto->cantidad;
                                ?> 
                            <tr>
                            <td name="Nombre"><?php echo $producto->Nombre ?></td>
                                <td name="Precio"><?php echo $producto->Precio; echo'€'?></td>
                                <td name="Cantidad"><?php echo $producto->cantidad ?></td>
                                <td name="totalt"><?php $total = $producto->Precio * $producto->cantidad; echo $total; echo'€' ?></td>
                                <?php $totalt += $total; ?>
                                <td><a class="btn btn-danger glyphicon glyphicon-trash" href="<?php echo "./carrito/quitarCarrito.php?indice=" . $indice?>"><i class="fa fa-trash"></i></a></td>
                                </form>
                            </tr>
                            <?php } ?> 
                            
                        </tbody>
                    </table>
                        <h3>Total: <?php echo '' . $totalt . '€' ?></h3>
                        <div id="paypal-button-container"></div>
                        <a href="./carrito/vaciarCarrito.php" class="btn btn-danger">Vaciar carrito</a>
                    </form>
                </div><br>
        </main>
    <?php include './inc/footer.php'; ?>
    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: "<?php echo $totalt;?>"
              }
            }]
          });
        },
        onApprove: function(data, actions) {
          return actions.order.capture().then(function(details) {
             window.location.href="./carrito.php?status=1";
          });
        }
      }).render('#paypal-button-container'); // Display payment options on your web page
    </script>
</body>
</html>