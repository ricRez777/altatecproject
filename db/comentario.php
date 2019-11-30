<?php 
require_once "conexion.php";

class Comentario{
	private $idComentario;
	private $idUsuario;
	private $idProducto;
	private $calificacion;
	private $comentario;
	private $fecha; 
	private $nickName;

	function __construct($pIdComentario, $pIdUsuario, $pIdProducto, $pCalificacion, $pComentario, $pFecha, 
		$pNickName){
		$this->idComentario = $pIdComentario;
		$this->idUsuario = $pIdUsuario;
		$this->idProducto = $pIdProducto;
		$this->calificacion = $pCalificacion;
		$this->comentario = $pComentario;
		$this->fecha = $pFecha;
		$this->nickName = $pNickName;

		$this->objConexion = new Conexion();
	}

	public function InsertarComentario(){
		$this->objConexion->conectar();

		$query = "CALL SPcomentario('null', '$this->idUsuario', '$this->idProducto', '$this->calificacion', 
		'$this->comentario', '$this->fecha', 'I')";

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

	public function MostrarComentarios(){
		$this->objConexion->conectar();

		$query = "CALL SPcomentario('null', 'null', '$this->idProducto', 'null', 'null', 'null', 'S')";
		
		$resultado = $this->objConexion->cone->query($query);
		
		$Comentarios = array();
		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objComentario = new Comentario(null, null, $consulta['idarticulo'], $consulta['Calificacion'], $consulta['Comentario'], $consulta['Fecha'], $consulta['NickName']);
			$Comentarios[$i] = $objComentario;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $Comentarios;
	}

	public function revisarComentarios(){
		$this->objConexion->conectar();
		$query = "CALL SPcomentario('null', '$this->idUsuario', '$this->idProducto', 'null', 'null', 'null', 'V')";
		$resultado = $this->objConexion->cone->query($query);
		if($resultado->num_rows > 0){
			$this->objConexion->desconectar();
			return false;
		}
		else{
			$this->objConexion->desconectar();
			return true;
		}
	}

	public function getIdComentario(){
		return $this->idComentario;
	}

	public function getIdUsuario(){
		return $this->idUsuario;
	}

	public function getIdProducto(){
		return $this->idProducto;
	}

	public function getCalificacion(){
		return $this->calificacion;
	}

	public function getComentario(){
		return $this->comentario;
	}

	public function getFecha(){
		return $this->fecha;
	}

	public function getNickName(){
		return $this->nickName;
	}

}

?>