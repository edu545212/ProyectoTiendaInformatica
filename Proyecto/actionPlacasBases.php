<?php
session_start();
include './BD/DAOPlacasBases.php';
$product = new PlacasBases();
if(isset($_POST["action"])){
	$html = $product->searchProducts($_POST);
	$data = array(
		"html"	=> $html,	
	);
	echo json_encode($data);	
}

?>