<?php 
	require_once "../db/carrito.php";

	$idCompra = $_POST['txtIdCompra'];

	$objCarrito = new Carrito(null, null, null, null, null, null, null, $idCompra, null, null, null, null);

	if($objCarrito->ComprarArticulo()){
		header('Location: ../carrito_mostrar.php');
	}
	else{
		echo "No se pudo quitar del carrito";
	}

?>