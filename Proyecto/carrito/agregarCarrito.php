<?php
if(!isset($_POST["idProductos"])) return;
$idProductos = $_POST["idProductos"];
$cantidadP = $_POST["cantidad"];
//conectamos a la base de datos
include_once "../BD/base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM Productos WHERE idProductos = ?;");
$sentencia->execute([$idProductos]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
//si no hay estock mandar estatus sin stock

if (!$producto) {
    header("Location: ../carrito.php?status=4");
    exit;
}

session_start();
if(!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$indice = false;
for ($i = 0; $i < count($_SESSION["carrito"]); $i++) {
	if($_SESSION["carrito"][$i]->idProductos == $idProductos){
		$indice = $i;
		break;
	}
}
if($indice === false){
	$producto->cantidad = $cantidadP;
	$producto->total = $producto->Precio;
	array_push($_SESSION["carrito"], $producto);
}else{
	$cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
	if ($cantidadExistente + $cantidadP > $producto->Stock) {
    header("Location: ../carrito.php?status=5");
    exit;
	}
	$cantidadExistente = $_SESSION["carrito"][$indice]->cantidad;
	$cantidadNueva= $cantidadExistente + $cantidadP;
	$_SESSION["carrito"][$indice]->cantidad = $cantidadNueva;
	$_SESSION["carrito"][$indice]->total = $_SESSION["carrito"][$indice]->cantidad * $_SESSION["carrito"][$indice]->Precio;
}
header("Location: ../carrito.php");
echo "$i";
if ($indice === false) {
echo "falso";
} else {
echo "true";
}
?>