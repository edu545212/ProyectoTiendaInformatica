<?php
	echo "<h2>La sesion ha sido borrada. </h2>";

	session_start();

	session_regenerate_id();

	session_destroy();

	header('Location: ../index.php');
?>

?>