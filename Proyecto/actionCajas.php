<?php
session_start();
include './BD/DAOCajas.php';
$product = new Cajas();
if(isset($_POST["action"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>