<!-- vacia el carrito -->
<?php
session_start();
unset($_SESSION['carrito']);
header("Location: ../carrito.php?status=3");
?>