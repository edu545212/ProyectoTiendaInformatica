<!-- Eliminar producto de la sesion carrito -->
<?php
if(!isset($_GET["indice"])) return;
$indice = $_GET["indice"];

session_start();

array_splice($_SESSION["carrito"], $indice, 1);
header("Location: ../carrito.php?status=3");
?>