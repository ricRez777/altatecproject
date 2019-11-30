<?php 
	require_once "../db/producto.php";

	$idProd = $_POST['txtIdProductoEliminar'];

	$objProducto = new Producto($idProd, null, null, null, null, null, null, null, null, null, null, null);

	if($objProducto->EliminarProducto()){
		header('Location: ../index.php');
	}
	else{
		echo "no se pudo eliminar el producto";
	}


?>