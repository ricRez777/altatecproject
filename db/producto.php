<?php 
require_once "conexion.php";

class Producto{
	private $idProducto;
	private $nombreProducto;
	private $descripcion;
	private $unidades;
	private $imagen1;
	private $imagen2;
	private $imagen3;
	private $video;
	private $precio;
	private $calificacion;
	private $idCategoria;
	private $borrador;

	function __construct($pIdProducto, $pNombreProducto, $pDescripcion, $pUnidades, $pImagen1, $pImagen2, $pImagen3,
						$pVideo, $pPrecio, $pCalificacion, $pIdCategoria, $pBorrador){
			$this->idProducto = $pIdProducto;
			$this->nombreProducto = $pNombreProducto;
			$this->descripcion = $pDescripcion;
			$this->unidades = $pUnidades;
			$this->imagen1 = $pImagen1;
			$this->imagen2 = $pImagen2; 
			$this->imagen3 = $pImagen3; 
			$this->video = $pVideo;
			$this->precio = $pPrecio;
			$this->calificacion = $pCalificacion;
			$this->idCategoria = $pIdCategoria;
			$this->borrador = $pBorrador;

			$this->objConexion = new Conexion();			
		}

	public function BuscarCategoria($pValue){
		$this->objConexion->conectar();
		$query = "SELECT A.idarticulo, A.NombreArticulo, A.Descripcion, A.Imagen1, A.Precio 
					FROM articulo A INNER JOIN categoria C
					ON A.idcategoria = C.idcategoria
					WHERE C.idcategoria =". $pValue;
        $resultado = $this->objConexion->cone->query($query);
        $articulos = array();
        $i = 0;
        while($consulta = mysqli_fetch_array($resultado)){
        	$objProducto = new Producto($consulta['idarticulo'], $consulta['NombreArticulo'], $consulta['Descripcion'], null, $consulta['Imagen1'], null, null, null, $consulta['Precio'], null, null, null);
        	$articulos[$i] = $objProducto;
        	$i = $i + 1;
        }
        $this->objConexion->desconectar();
        return $articulos;
	}

	public function BuscarProducto($pCadena){
		$this->objConexion->conectar();
		$query = "SELECT idarticulo, NombreArticulo, Descripcion, Imagen1, Precio FROM articulo 
        WHERE NombreArticulo LIKE '%".$pCadena."%' OR Descripcion LIKE '%".$pCadena."%'";
        $resultado = $this->objConexion->cone->query($query);
        $articulos = array();
        $i = 0;
        while($consulta = mysqli_fetch_array($resultado)){
        	$objProducto = new Producto($consulta['idarticulo'], $consulta['NombreArticulo'], $consulta['Descripcion'], null, $consulta['Imagen1'], null, null, null, $consulta['Precio'], null, null, null);
        	$articulos[$i] = $objProducto;
        	$i = $i + 1;
        }
        $this->objConexion->desconectar();
        return $articulos;
	}

	public function InsertarProducto(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('$this->nombreProducto', '$this->descripcion', '$this->unidades', '$this->imagen1', '$this->imagen2', '$this->imagen3', '$this->video', '$this->precio', 'null', '$this->idCategoria',
			'1', 'IP', 'null')";

		$resultado = $this->objConexion->cone->query($query);

		if($resultado){
			$this->objConexion->desconectar();
			return true; 
		}
		else{
			$this->objConexion->desconectar();
			return false; 	
		}
	}

	public function ModificarProducto(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('$this->nombreProducto', '$this->descripcion', '$this->unidades', '$this->imagen1', '$this->imagen2', '$this->imagen3', '$this->video', '$this->precio', 'null', '$this->idCategoria',
			'1', 'U', '$this->idProducto')";

		$resultado = $this->objConexion->cone->query($query);

		if($resultado){
			$this->objConexion->desconectar();
			return true; 
		}
		else{
			$this->objConexion->desconectar();
			return false; 	
		}
	}

	public function InsertarBorrador(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('$this->nombreProducto', '$this->descripcion', '$this->unidades', '$this->imagen1', '$this->imagen2', '$this->imagen3', '$this->video', '$this->precio', 'null', '$this->idCategoria',
			'1', 'IB', 'null')";

		$resultado = $this->objConexion->cone->query($query);

		if($resultado){
			$this->objConexion->desconectar();
			return true; 
		}
		else{
			$this->objConexion->desconectar();
			return false; 	
		}
	}

	public function EliminarProducto(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null',
			'null', 'D', '$this->idProducto')";

		$resultado = $this->objConexion->cone->query($query);

		if($resultado){
			$this->objConexion->desconectar();
			return true; 
		}
		else{
			$this->objConexion->desconectar();
			return false; 	
		}	
	}

	public function Novedades(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null',
			'null', 'N', 'null')";
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objProducto = new Producto($consulta['idarticulo'], $consulta['NombreArticulo'], $consulta['Descripcion'], null, $consulta['Imagen1'], null, null, null, $consulta['Precio'], null, null, null);
			$articulos[$i] = $objProducto;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function Destacados(){
		$this->objConexion->conectar();
		$query = "CALL SPArticulo('null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null',
			'null', 'Des', 'null')";
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objProducto = new Producto($consulta['idarticulo'], $consulta['NombreArticulo'], $consulta['Descripcion'], null, $consulta['Imagen1'], null, null, null, $consulta['Precio'], null, null, null);
			$articulos[$i] = $objProducto;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function MostrarProducto($pId){
	$this->objConexion->conectar();
	$query = "CALL SPArticulo('null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'S', '$pId')";
	$resultado = $this->objConexion->cone->query($query);
	$consulta = mysqli_fetch_array($resultado);
		$objP = new Producto($consulta['idarticulo'], 
			$consulta['NombreArticulo'], 
			$consulta['Descripcion'], 
			$consulta['Unidades'], 
			$consulta['Imagen1'], 
			$consulta['Imagen2'], 
			$consulta['Imagen2'], 
			$consulta['Video'], 
			$consulta['Precio'], 
			$consulta['Calificacion'],
			$consulta['idcategoria'], 
			$consulta['borrador'] );
		$this->objConexion->desconectar();
		return $objP;	
	}

	public function MostrarBorradores($pModo){
		$this->objConexion->conectar();
		$query="";
		if($pModo == 1){
			$query = "CALL SPadmin('Borr')";
		}
		else if($pModo == 2){
			$query = "CALL SPadmin('New')";
		}
		else if($pModo == 3){
			$query = "CALL SPadmin('Old')";
		}
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objProducto = new Producto($consulta['idarticulo'],
			$consulta['NombreArticulo'], 
			$consulta['Descripcion'], 
			$consulta['Unidades'], 
			$consulta['Imagen1'], 
			$consulta['Imagen2'], 
			$consulta['Imagen2'], 
			$consulta['Video'], 
			$consulta['Precio'], 
			$consulta['Calificacion'],
			$consulta['idcategoria'], 
			$consulta['borrador'] );
			$articulos[$i] = $objProducto;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function MostrarProductos($pModo){
		$this->objConexion->conectar();
		$query="";
		if($pModo == 1){
			$query = "CALL SPadmin('Pub')";
		}
		else if($pModo == 2){
			$query = "CALL SPadmin('CALF')";
		}
		else if($pModo == 3){
			$query = "CALL SPadmin('NEWP')";
		}
		else if($pModo == 4){
			$query = "CALL SPadmin('OLDP')";
		}
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objProducto = new Producto($consulta['idarticulo'], 
				$consulta['NombreArticulo'], 
			$consulta['Descripcion'], 
			$consulta['Unidades'], 
			$consulta['Imagen1'], 
			$consulta['Imagen2'], 
			$consulta['Imagen2'], 
			$consulta['Video'], 
			$consulta['Precio'], 
			$consulta['Calificacion'],
			$consulta['idcategoria'], 
			$consulta['borrador'] );
			$articulos[$i] = $objProducto;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function getImagen(){
		return $this->imagen1;
	}

	public function setImagen($pImagen){
		$this->imagen1 = $pImagen;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getNombreProducto(){
		return $this->nombreProducto;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function getUnidades(){
		return $this->unidades;
	}

	public function getImagen1(){
		return $this->imagen1;
	}

	public function getImagen2(){
		return $this->imagen2;
	}

	public function getImagen3(){
		return $this->imagen3;
	}

	public function getVideo(){
		return $this->video;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}


}
?>
