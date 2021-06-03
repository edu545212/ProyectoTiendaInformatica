<?php
session_start();
include './BD/DAODiscosDuros.php';
$product = new DiscosDuros();
if(isset($_POST["action"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>