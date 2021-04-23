<?php
	
	function conectar($esRemota){
		if ($esRemota){
			$servidor = "leonmunozeduardo-db.c0iucejz0d7p.eu-west-3.rds.amazonaws.com";
			$usuario = "EduardoRTX";
			$password = "SoyEduardo1";
			$bd = "TiendaOnline";
		} else {
			$servidor = "127.0.0.1:3306";
			$usuario = "root";
			$password = "Alumn@2020";
			$bd = "TiendaOnline";
		}

		//para establever una conexcion con una bd necesitamos usar la funcion mysqli_connect();
		$conector = mysqli_connect($servidor,$usuario,$password,$bd);

		if ($conector){
			return $conector;
		} else {
			echo "Error no se ha podido conectar con la BD <br>";
			//funcion que indica el error al conectar
			echo mysqli_connect_error();
		}
	}
?>