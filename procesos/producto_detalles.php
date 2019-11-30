<?php 
require_once "db/producto.php";
require_once "db/comentario.php";

	$idProducto = $_GET['id'];
	
	if(isset($_SESSION['idusuario'])){	

		$idUse = $_SESSION['idusuario'];
		$objComentario = new Comentario(null, $idUse, $idProducto, null, null, null, null);
	}
	else{
		$objComentario = new Comentario(null, null, $idProducto, null, null, null, null);
	}

	$objProducto = new Producto(null, null, null, null, null, null, null, null, null, null, null, null);

	$productos = $objProducto->MostrarProducto($idProducto);

	$AllComentarios = $objComentario->MostrarComentarios();

?>