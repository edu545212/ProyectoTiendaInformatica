<?php
    //crea un nuevo Procesador 
	function nuevoProcesador($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'Procesadores')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO Procesador VALUES (default, '$idProducto', '$Soket', '$benchmark')";
        $resultado = mysqli_query($conexion, $consultaP);
		return $resultado;
	}

	//funcion para consultar si existe el procesador
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que sirve para obtener los datos de los procesadores
	function compProcesadores($conexion){
		$consulta = "SELECT * FROM Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de mostrar los datos de un procesador en concreto
	function editarProcesadorFormulario ($conexion, $idProcesador){
		$consulta = "SELECT * FROM Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos WHERE idProcesador = '$idProcesador'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que edita los datos del procesador sin imagen
	function editarProcesadorNoImg($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $idProcesador){
		$consulta = "UPDATE Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Soket='$Soket', Benchmark='$benchmark' WHERE idProcesador = '$idProcesador'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que edita los datos del procesador con imagen
	function editarProcesador($conexion, $Nombre, $Marca, $Soket, $benchmark, $Stock, $Precio, $Descripcion, $nombreImg, $idProcesador){
		$consulta = "UPDATE Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Soket='$Soket', Benchmark='$benchmark' WHERE idProcesador = '$idProcesador'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que elimina un procesador
	function eliminarProcesador($conexion, $idProcesador){
		$consulta = "DELETE Procesador, Productos FROM Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos
			WHERE Procesador.idProcesador= '$idProcesador'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de hacer los filtros y mostrar los datos en funcion de los filtros
	class Procesador {
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
				FROM Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos ORDER BY idProcesador DESC";
			return  $this->getData($sqlQuery);
		}
		public function getSoket(){
			$sqlQuery = "
				SELECT DISTINCT(Soket)
				FROM Procesador 
				ORDER BY Soket DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM Procesador INNER JOIN Productos ON Procesador.idProductos = Productos.idProductos";
			if(isset($_POST["Marca"])) {
				$MarcaFilterData = implode("','", $_POST["Marca"]);
				$sqlQuery .= "
				AND Marca IN('".$MarcaFilterData."')";
			}
			if(isset($_POST["Soket"])){
				$SoketFilterData = implode("','", $_POST["Soket"]);
				$sqlQuery .= "
				AND Soket IN('".$SoketFilterData."')";
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
                    	<img class="card-img-top mx-1 my-4" src="./img/Procesadores/'. $row['Imagen'].'" class="img-fluid" style="width: 90%; height: 150px">
						<div class="card-body d-flex flex-column">
							<h4 class="card-title text-center">'.$row['Nombre'].'</h4>
							<p class="card-text text-center">Precio: '.$row['Precio'].'???</p>
							<p class="text-center mt-auto">
								<a href="infoProductos.php?idProductos='.$row['idProductos'].'" class="btn btn-primary btn-sm btn-raised btn-block"><i class="fa fa-plus"></i>&nbsp; Detalles</a>
							</p>
						</div>
                	</div>';
				}
			} else {
				$searchResultHTML = '<h3>No se ha encontrado ning??n producto..</h3>';
			}
			return $searchResultHTML;	
		}	
	}
?>
