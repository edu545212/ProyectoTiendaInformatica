<?php
session_start();
include './BD/DAOProcesador.php';
$product = new Procesador();
if(isset($_POST["action"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>