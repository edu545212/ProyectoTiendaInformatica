<?php
    //crea un nuevo TarjetasGraficas 
	function nuevoTarjetasGraficas($conexion, $Nombre, $Marca, $Tipo, $Memoria ,$benchmark, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'TarjetasGraficas')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO TarjetasGraficas VALUES (default, '$idProducto', '$Tipo', '$Memoria', '$benchmark')";
        mysqli_query($conexion, $consultaP);
	}

	//funcion para consultar si existe el TarjetasGraficas
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarTarjetasGraficasFormulario ($conexion, $idTarjetasGraficas){
		$consulta = "SELECT * FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos WHERE idTarjetasGraficas = '$idTarjetasGraficas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarTarjetasGraficasNoImg($conexion, $Nombre, $Marca, $Memoria, $Benchmark, $Tipo, $Stock, $Precio, $Descripcion, $idTarjetasGraficas){
		$consulta = "UPDATE TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Memoria='$Memoria', Benchmark='$Benchmark', Tipo='$Tipo' WHERE idTarjetasGraficas = '$idTarjetasGraficas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function editarTarjetasGraficas($conexion, $Nombre, $Marca, $Memoria, $Benchmark, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idTarjetasGraficas){
		$consulta = "UPDATE TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Memoria='$Memoria', Benchmark='$Benchmark', Tipo='$Tipo' WHERE idTarjetasGraficas = '$idTarjetasGraficas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	function eliminarTarjetasGraficas($conexion, $idTarjetasGraficas){
		$consulta = "DELETE TarjetasGraficas, Productos FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos
		WHERE TarjetasGraficas.idTarjetasGraficas= '$idTarjetasGraficas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	class TarjetasGraficas {
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
				FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos ORDER BY idTarjetasGraficas DESC";
			return  $this->getData($sqlQuery);
		}

		public function getTipo(){
			$sqlQuery = "
				SELECT DISTINCT(Tipo)
				FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos ORDER BY idTarjetasGraficas DESC";
			return  $this->getData($sqlQuery);
		}

		public function getMemoria(){
			$sqlQuery = "
				SELECT DISTINCT(Memoria)
				FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos ORDER BY idTarjetasGraficas DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM TarjetasGraficas INNER JOIN Productos ON TarjetasGraficas.idProductos = Productos.idProductos";
			if(isset($_POST["Marca"])) {
				$MarcaFilterData = implode("','", $_POST["Marca"]);
				$sqlQuery .= "
				AND Marca IN('".$MarcaFilterData."')";
			}

			if(isset($_POST["Tipo"])) {
				$TipoFilterData = implode("','", $_POST["Tipo"]);
				$sqlQuery .= "
				AND Tipo IN('".$TipoFilterData."')";
			}

			if(isset($_POST["Memoria"])) {
				$MemoriaFilterData = implode("','", $_POST["Memoria"]);
				$sqlQuery .= "
				AND Memoria IN('".$MemoriaFilterData."')";
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
                    	<img class="card-img-top mx-1 my-4" src="./img/TarjetasGraficas/'. $row['Imagen'].'" style="width: 90%; height: 150px">
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
