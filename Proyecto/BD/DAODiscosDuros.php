<?php
    //crea un nuevo DiscosDuros 
	function nuevoDiscosDuros($conexion, $Nombre, $Marca, $Tipo, $Capacidad, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'DiscosDuros')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO DiscosDuros VALUES (default, '$idProducto', '$Capacidad', '$Tipo')";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el DiscosDuros
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarDiscosDurosFormulario ($conexion, $idDiscosDuros){
		$consulta = "SELECT * FROM DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos WHERE idDiscosDuros = '$idDiscosDuros'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarDiscosDurosNoImg($conexion, $Nombre, $Marca, $Capacidad, $Tipo, $Stock, $Precio, $Descripcion){
		$consulta = "UPDATE DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Capacidad='$Capacidad', Tipo='$Tipo' WHERE Nombre = '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarDiscosDuros($conexion, $Nombre, $Marca, $Capacidad, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "UPDATE DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Capacidad='$Capacidad', Tipo='$Tipo' WHERE Nombre = '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	class DiscosDuros {
		private $host  = 'leonmunozeduardo-db.c0iucejz0d7p.eu-west-3.rds.amazonaws.com';
		private $user  = 'EduardoRTX';
		private $password   = "SoyEduardo1";
		private $database  = "TiendaInformatica";
		private $dbConnect = false;
		public function __construct(){
			if(!$this->dbConnect){ 
				$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
				if($conn->connect_error){
					die("Error al conectar con MySQL: " . $conn->connect_error);
				}else{
					$this->dbConnect = $conn;
				}
			}
		}
		private function getData($sqlQuery) {
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			if(!$result){
				die('Error en la consulta: '. mysqli_error($conn));
			}
			$data= array();
			
			/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
				while ($row = mysqli_fetch_assoc($result)) {
				$data[]=$row;            
			}
			return $data;
		}

		public function getMarca(){
			$sqlQuery = "
				SELECT DISTINCT(Marca)
				FROM DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos ORDER BY idDiscosDuros DESC";
			return  $this->getData($sqlQuery);
		}

		public function getCapacidad(){
			$sqlQuery = "
				SELECT DISTINCT(Capacidad)
				FROM DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos ORDER BY idDiscosDuros DESC";
			return  $this->getData($sqlQuery);
		}

		public function getTipo(){
			$sqlQuery = "
				SELECT DISTINCT(Tipo)
				FROM DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos ORDER BY idDiscosDuros DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM DiscosDuros INNER JOIN Productos ON DiscosDuros.idProductos = Productos.idProductos";
			if(isset($_POST["Marca"])) {
				$MarcaFilterData = implode("','", $_POST["Marca"]);
				$sqlQuery .= "
				AND Marca IN('".$MarcaFilterData."')";
			}

			if(isset($_POST["Capacidad"])) {
				$CapacidadFilterData = implode("','", $_POST["Capacidad"]);
				$sqlQuery .= "
				AND Capacidad IN('".$CapacidadFilterData."')";
			}
			if(isset($_POST["Tipo"])) {
				$TipoFilterData = implode("','", $_POST["Tipo"]);
				$sqlQuery .= "
				AND Tipo IN('".$TipoFilterData."')";
			}

			$sqlQuery .= " ORDER By Precio";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$totalResult = mysqli_num_rows($result);
			$searchResultHTML = '';
			if($totalResult > 0) {
				/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
				while ($row = mysqli_fetch_assoc($result)) {
					$searchResultHTML .= '
					<div class="card col-md-4 col-lg-3 col-xl-2 mx-1 my-1">
                    	<img class="card-img-top mx-1 my-4" src="./img/DiscosDuros/'. $row['Imagen'].'" style="width: 90%; height: 150px">
						<div class="card-body">
							<h4 class="card-title text-center">'.$row['Nombre'].'</h4>
							<p class="card-text text-center">Precio: '.$row['Precio'].'€</p>
							<p class="text-center">
								<a href="infoConsolas.php?idPlataforma='.$row['idPlataforma'].'" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
							</p>
						</div>
                	</div>';
				}
			} else {
				$searchResultHTML = '<h3>No se ha encontrado ningún producto..</h3>';
			}
			return $searchResultHTML;	
		}	
	}
?>
