<?php
session_start();
include './BD/DAOTarjetasGraficas.php';
$product = new TarjetasGraficas();
if(isset($_POST["action"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>