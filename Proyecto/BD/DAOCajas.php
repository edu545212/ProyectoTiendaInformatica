<?php
    //crea un nuevo Cajas 
	function nuevoCajas($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'Cajas')";
		mysqli_query($conexion, $consulta);
		$idProductos = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO Cajas VALUES (default, '$idProductos', '$Tipo')";
        $resultado = mysqli_query($conexion, $consultaP);
		return $resultado;
	}

	//funcion para consultar si existe el Cajas
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que muestra todos los datos de una caja
	function editarCajasFormulario ($conexion, $idCajas){
		$consulta = "SELECT * FROM Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos WHERE idCajas = '$idCajas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que edita una caja sin imagen
	function editarCajasNoImg($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $idCajas){
		$consulta = "UPDATE Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Tipo='$Tipo' WHERE idCajas = '$idCajas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que edita una caja 
	function editarCajas($conexion, $Nombre, $Marca, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idCajas){
		$consulta = "UPDATE Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Tipo='$Tipo' WHERE idCajas = '$idCajas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que elimina una caja
	function eliminarCajas($conexion, $idCajas){
		$consulta = "DELETE Cajas, Productos FROM Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos
		WHERE Cajas.idCajas= '$idCajas'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de los filtros de las cajas y mostrar los datos
	class Cajas {
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
				FROM Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos ORDER BY idCajas DESC";
			return  $this->getData($sqlQuery);
		}

		public function getTipo(){
			$sqlQuery = "
				SELECT DISTINCT(Tipo)
				FROM Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos ORDER BY idCajas DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM Cajas INNER JOIN Productos ON Cajas.idProductos = Productos.idProductos";
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

			$sqlQuery .= " ORDER By Precio";
			$result = mysqli_query($this->dbConnect, $sqlQuery);
			$totalResult = mysqli_num_rows($result);
			$searchResultHTML = '';
			if($totalResult > 0) {
				/*while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {*/
				while ($row = mysqli_fetch_assoc($result)) {
					$searchResultHTML .= '
					<div class="card col-md-4 col-lg-3 col-xl-2 mx-1 my-1">
                    	<img class="card-img-top mx-1 my-4" src="./img/Cajas/'. $row['Imagen'].'" class="img-fluid" style="width: 90%; height: 150px">
						<div class="card-body d-flex flex-column">
							<h4 class="card-title text-center">'.$row['Nombre'].'</h4>
							<p class="card-text text-center">Precio: '.$row['Precio'].'€</p>
							<p class="text-center mt-auto">
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
