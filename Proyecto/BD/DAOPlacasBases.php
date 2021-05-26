<?php
    //crea un nuevo PlacasBases 
	function nuevoPlacasBases($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'PlacasBases')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO PlacasBases VALUES (default, '$idProducto', '$Chipset', '$Forma')";
        $resultado = mysqli_query($conexion, $consultaP);
		return $resultado;
	}

	//funcion para consultar si existe el PlacasBases
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarPlacasBasesFormulario ($conexion, $idPlacasBases){
		$consulta = "SELECT * FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos WHERE idPlacasBases = '$idPlacasBases'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarPlacasBasesNoImg($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion, $idPlacasBases){
		$consulta = "UPDATE PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Chipset='$Chipset', Forma='$Forma' WHERE idPlacasBases = '$idPlacasBases'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarPlacasBases($conexion, $Nombre, $Marca, $Chipset, $Forma, $Stock, $Precio, $Descripcion, $nombreImg, $idPlacasBases){
		$consulta = "UPDATE PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Chipset='$Chipset', Forma='$Forma' WHERE idPlacasBases = '$idPlacasBases'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function eliminarPlacasBases($conexion, $idPlacasBases){
		$consulta = "DELETE PlacasBases, Productos FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos
		WHERE PlacasBases.idPlacasBases= '$idPlacasBases'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	class PlacasBases {
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
				FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos ORDER BY idPlacasBases DESC";
			return  $this->getData($sqlQuery);
		}

		public function getChipset(){
			$sqlQuery = "
				SELECT DISTINCT(Chipset)
				FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos ORDER BY idPlacasBases DESC";
			return  $this->getData($sqlQuery);
		}

		public function getForma(){
			$sqlQuery = "
				SELECT DISTINCT(Forma)
				FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos ORDER BY idPlacasBases DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM PlacasBases INNER JOIN Productos ON PlacasBases.idProductos = Productos.idProductos";
			if(isset($_POST["Marca"])) {
				$MarcaFilterData = implode("','", $_POST["Marca"]);
				$sqlQuery .= "
				AND Marca IN('".$MarcaFilterData."')";
			}

			if(isset($_POST["Chipset"])) {
				$ChipsetFilterData = implode("','", $_POST["Chipset"]);
				$sqlQuery .= "
				AND Chipset IN('".$ChipsetFilterData."')";
			}

			if(isset($_POST["Forma"])) {
				$FormaFilterData = implode("','", $_POST["Forma"]);
				$sqlQuery .= "
				AND Forma IN('".$FormaFilterData."')";
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
                    	<img class="card-img-top mx-1 my-4" src="./img/PlacasBases/'. $row['Imagen'].'" style="width: 90%; height: 150px">
						<div class="card-body">
							<h4 class="card-title text-center">'.$row['Nombre'].'</h4>
							<p class="card-text text-center">Precio: '.$row['Precio'].'€</p>
							<p class="text-center">
								<a href="infoProductos.php?idProductos='.$row['idProductos'].'" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
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
