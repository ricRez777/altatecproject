<?php 
	require_once "../db/carrito.php";

	$NuevoPrecio = $_POST['txtPrecioMod'];
	$idUsuario = $_POST['txtIdUsuario'];
	$idCompra = $_POST['txtIdCompra'];

	$objCarrito = new Carrito($idUsuario, null, null, null, null, null, $NuevoPrecio, $idCompra, null, null,
	null, null);

	if($objCarrito->ActualizarPrecio()){
		header('Location: ../admin_mensajes.php');
	}
	else{
		echo "No se pudo modificar el carrito";
	}

?>