<?php 
require_once "conexion.php";

class Categoria{
	private $idCategoria;
	private $nombreCategoria;
	private $tipo;

	private $objConexion;	

	function __construct($pIdCategoria, $pNombreCategoria, $pTipo){
		$this->idCategoria = $pIdCategoria;
		$this->nombreCategoria = $pNombreCategoria;
		$this->tipo = $pTipo;
		$this->objConexion = new Conexion();			
	}

	public function getIdCategoria(){
		return $this->idCategoria;
	}
	public function getNombreCategoria(){
		return $this->nombreCategoria;
	}
	public function getTipo(){
		return $this->tipo;
	}

	public function categoriasPorTipo($pTipo){
		
		$this->objConexion->conectar();
		$query = "SELECT idcategoria, NombreCategoria FROM categoriasall where Tipo = '$pTipo'";
		$resultado = $this->objConexion->cone->query($query);

		$categorias = array();

		while($consulta = mysqli_fetch_array($resultado)){
			$categorias[] = $consulta['idcategoria'] . " " . $consulta['NombreCategoria'];
		}
		return $categorias;
	}

	/*public function categoriasNav($pTipo){
		
		$this->objConexion->conectar();
		$query = "SELECT NombreCategoria FROM categoriasall where Tipo = '$pTipo'";
		$resultado = $this->objConexion->cone->query($query);

		$categorias = array();

		while($consulta = mysqli_fetch_array($resultado)){
			$categorias[] = $consulta['NombreCategoria'];
		}
		return $categorias;
	}*/

	public function categoriasNav($pTipo){
		
		$this->objConexion->conectar();
		$query = "SELECT * FROM categoria where Tipo = '$pTipo';";
		$resultado = $this->objConexion->cone->query($query);

		$categorias = array();

		$i = 0;
		while($consulta = mysqli_fetch_array($resultado)){
			$objProducto = new Categoria($consulta['idcategoria'], $consulta['NombreCategoria'], $consulta['Tipo']);
			$categorias[$i] = $objProducto;
			$i = $i + 1;
		}
		$this->objConexion->desconectar();
		return $categorias;

	}


}

?>