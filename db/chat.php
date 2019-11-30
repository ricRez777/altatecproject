<?php 
require_once "conexion.php";

class Chat{
	private $idMensaje;
	private $mensaje;
	private $idUsuario;
	private $NickName;
	private $idProducto;
	private $nombreProducto;

	function __construct($pIdMensaje, $pMensaje, $pIdUsuario, $pNickName, $pIdProducto, $pNombreProducto){
		$this->idMensaje = $pIdMensaje;
		$this->mensaje = $pMensaje;
		$this->idUsuario = $pIdUsuario;
		$this->NickName = $pNickName;
		$this->idProducto = $pIdProducto;
		$this->nombreProducto = $pNombreProducto;

		$this->objConexion = new Conexion();
	}

	public function MostrarChat(){
		$this->objConexion->conectar();
		$query = "CALL SPchat('null', 'null', '$this->idUsuario', '$this->idProducto', 'S');";
		$resultado = $this->objConexion->cone->query($query);
		$mensajes = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objChat = new Chat(null, $consulta['Mensaje'], $consulta['idusuario'], 
				$consulta['NickName'], $consulta['idarticulo'], $consulta['NombreArticulo']);
			$mensajes[$i] = $objChat;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $mensajes;
	}

	public function InsertarMensaje(){
		$this->objConexion->conectar();
		$query = "CALL SPchat('null', '$this->mensaje', '$this->idUsuario', '$this->idProducto', 'I');";

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

	public function getNickName(){
		return $this->NickName;
	}
	public function getMensaje(){
		return $this->mensaje;
	}
	public function getNombreProducto(){
		return $this->nombreProducto;
	}
	public function getIdUsuario(){
		return $this->idUsuario;
	}
}
?>