<?php 
require_once "conexion.php";

class Carrito {
	private $idUsuario; 
	private $idProducto;
	private $fechaCompra;
	private $cantidad;
	private $formaDePago;
	private $status;
	private $precio;
	private $idCompra;

	private $nickName;
	private $imagen1;
	private $nombreArticulo;
	private $disponibles;

	function __construct($pIdUsuario, $pIdProducto, $pFechaCompra, $pCantidad, $pFormaDePago, 
						$pStatus, $pPrecio, $pIdCompra, $pImagen, $pNombreArticulo, $pDisponibles, $pNickName){
		$this->idUsuario = $pIdUsuario;
		$this->idProducto = $pIdProducto;
		$this->fechaCompra = $pFechaCompra;
		$this->cantidad = $pCantidad;
		$this->formaDePago = $pFormaDePago;
		$this->status = $pStatus;
		$this->precio = $pPrecio;
		$this->idCompra = $pIdCompra;
		$this->imagen1 = $pImagen;
		$this->nombreArticulo = $pNombreArticulo;
		$this->disponibles = $pDisponibles;
		$this->nickName = $pNickName;

		$this->objConexion = new Conexion();
	}


	public function InsertarCarrito(){
		$this->objConexion->conectar();
		$query = "CALL SPcompra('null', '$this->idUsuario', '$this->idProducto', '$this->fechaCompra', '$this->cantidad', '$this->formaDePago', '$this->status', '$this->precio', 'I')";

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

	public function ActualizarPrecio(){
		$this->objConexion->conectar();
		$query = "CALL SPcompra('$this->idCompra', 'null', 'null', 'null', 'null', 'null', 'null', 
		'$this->precio', 'UP')";

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

	public function MostrarCarrito($pIdUse){

		$this->objConexion->conectar();
		$query = "CALL SPcompra('null', '$pIdUse', 'null', 'null', 'null', 'null', 'null', 'null', 'S')";
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objCarrito = new Carrito($consulta['idcompra'], $consulta['idarticulo'], null, $consulta['Cantidad'], null, null, 
				$consulta['PrecioFinal'], $consulta['idcompra'], $consulta['Imagen1'], 
				$consulta['NombreArticulo'], $consulta['Unidades'], null);

			$articulos[$i] = $objCarrito;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function MostrarHistorial($pIdUse){

		$this->objConexion->conectar();
		$query = "CALL SPcompra('null', '$pIdUse', 'null', 'null', 'null', 'null', 'null', 'null', 'H')";
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objCarrito = new Carrito(null, null, $consulta['FechaCompra'], $consulta['Cantidad'], null, null, 
				$consulta['PrecioFinal'], $consulta['idcompra'], $consulta['Imagen1'], 
				$consulta['NombreArticulo'], $consulta['Unidades'], null);

			$articulos[$i] = $objCarrito;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function QuitarDeCarrito(){
		$this->objConexion->conectar();
		$query = "CALL SPcompra('$this->idCompra', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'Q')";
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

	public function ComprarArticulo(){
		$this->objConexion->conectar();
		$query = "CALL SPcompra('$this->idCompra', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'C')";
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

	public function MensajesAdmin(){

		$this->objConexion->conectar();
		$query = "CALL SPcompra('null', '1', 'null', 'null', 'null', 'null', 'null', 'null', 'M')";
		$resultado = $this->objConexion->cone->query($query);
		$articulos = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objCarrito = new Carrito($consulta['idusuario'], $consulta['idarticulo'], null, 
				$consulta['Cantidad'], null, null, 
				$consulta['PrecioFinal'], $consulta['idcompra'], $consulta['Imagen1'], 
				$consulta['NombreArticulo'], $consulta['Unidades'], $consulta['NickName']);

			$articulos[$i] = $objCarrito;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $articulos;
	}

	public function getDisponibles(){
		return $this->disponibles;
	}

	public function getNombreArticulo(){
		return $this->nombreArticulo;
	}

	public function getImagen1(){
		return $this->imagen1;
	}

	public function getIdCompra(){
		return $this->idCompra;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getFechaCompra(){
		return $this->fechaCompra;
	}

	public function getCantidad(){
		return $this->cantidad;
	}

	public function getFormaDePago(){
		return $this->formaDePago;
	}

	public function getStatus(){
		return $this->status;
	}

	public function getPrecio(){
		return $this->precio;
	}

	public function getNickName(){
		return $this->nickName;
	}
}

?>