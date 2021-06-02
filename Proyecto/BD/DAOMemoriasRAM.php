<?php
    //crea un nuevo MemoriaRAM 
	function nuevoMemoriasRAM($conexion, $Nombre, $Marca, $Almacenamiento, $Formato, $Tipo ,$Stock, $Precio, $Descripcion, $nombreImg){
		$consulta = "INSERT INTO Productos VALUES (default, '$Nombre', '$Descripcion', '$Precio', '$Stock', '$nombreImg', '$Marca', 'MemoriasRAM')";
		mysqli_query($conexion, $consulta);
		$idProducto = mysqli_insert_id($conexion);
        $consultaP = "INSERT INTO MemoriasRAM VALUES (default, '$idProducto', '$Almacenamiento', '$Formato', '$Tipo')";
        $resultado = mysqli_query($conexion, $consultaP);
		return $resultado;
	}

	//funcion para consultar si existe el MemoriaRAM
	function consultaNombre($conexion, $Nombre){
		$consulta = "SELECT * FROM Productos WHERE Nombre= '$Nombre'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de mostrar los datos de una memoria ram en concreto
	function editarMemoriasRAMFormulario ($conexion, $idMemoriasRAM){
		$consulta = "SELECT * FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos WHERE idMemoriasRAM = '$idMemoriasRAM'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de editar la memoria ram sin imagen
	function editarMemoriasRAMNoImg($conexion, $Nombre, $Marca, $Almacenamiento, $Formato, $Tipo, $Stock, $Precio, $Descripcion, $idMemoriasRAM){
		$consulta = "UPDATE MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Almacenamiento='$Almacenamiento', Formato='$Formato', Tipo='$Tipo' WHERE idMemoriasRAM = '$idMemoriasRAM'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de editar la memoria ram
	function editarMemoriasRAM($conexion, $Nombre, $Marca, $Almacenamiento, $Formato, $Tipo, $Stock, $Precio, $Descripcion, $nombreImg, $idMemoriasRAM){
		$consulta = "UPDATE MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos
			SET Nombre='$Nombre', Marca='$Marca', Stock='$Stock', Precio='$Precio', Descripcion='$Descripcion',
			Imagen='$nombreImg', Almacenamiento='$Almacenamiento', Formato='$Formato', Tipo='$Tipo' WHERE idMemoriasRAM = '$idMemoriasRAM'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que elimina la memoria ram
	function eliminarMemoriasRAM($conexion, $idMemoriasRAM){
		$consulta = "DELETE MemoriasRAM, Productos FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos
		WHERE MemoriasRAM.idMemoriasRAM= '$idMemoriasRAM'";
		$resultado = mysqli_query($conexion, $consulta);
		return $resultado;
	}

	//funcion que se encarga de filtrar los datos de la memoria ram y mostrarlos
	class MemoriasRAM {
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
				FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos ORDER BY idMemoriasRAM DESC";
			return  $this->getData($sqlQuery);
		}

		public function getAlmacenamiento(){
			$sqlQuery = "
				SELECT DISTINCT(Almacenamiento)
				FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos ORDER BY idMemoriasRAM DESC";
			return  $this->getData($sqlQuery);
		}

		public function getFormato(){
			$sqlQuery = "
				SELECT DISTINCT(Formato)
				FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos ORDER BY idMemoriasRAM DESC";
			return  $this->getData($sqlQuery);
		}

		public function getTipo(){
			$sqlQuery = "
				SELECT DISTINCT(Tipo)
				FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos ORDER BY idMemoriasRAM DESC";
			return  $this->getData($sqlQuery);
		}

		public function searchProducts(){
			$sqlQuery = "SELECT * FROM MemoriasRAM INNER JOIN Productos ON MemoriasRAM.idProductos = Productos.idProductos";
			if(isset($_POST["Marca"])) {
				$MarcaFilterData = implode("','", $_POST["Marca"]);
				$sqlQuery .= "
				AND Marca IN('".$MarcaFilterData."')";
			}

			if(isset($_POST["Almacenamiento"])) {
				$AlmacenamientoFilterData = implode("','", $_POST["Almacenamiento"]);
				$sqlQuery .= "
				AND Almacenamiento IN('".$AlmacenamientoFilterData."')";
			}


			if(isset($_POST["Formato"])) {
				$FormatoFilterData = implode("','", $_POST["Formato"]);
				$sqlQuery .= "
				AND Formato IN('".$FormatoFilterData."')";
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
                    	<img class="card-img-top mx-1 my-4" src="./img/MemoriasRAM/'. $row['Imagen'].'" class="img-fluid" style="width: 90%; height: 150px">
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
