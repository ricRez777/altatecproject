<?php 
	
	require_once "../db/producto.php";

	$idProducto = $_POST['txtIdProd'];
	$nombre = $_POST['txtnombreProducto'];
	$descripcion = $_POST['txtDescripcion'];
	$precio = $_POST['txtPrecio'];
	$cantidad = $_POST['txtCantidad'];

	$categoria = $_POST['cbCategoria'];
	$imagen1 = addslashes(file_get_contents($_FILES['fileimage1p']['tmp_name']));
	$imagen2 = addslashes(file_get_contents($_FILES['fileimage2p']['tmp_name']));
	$imagen3 = addslashes(file_get_contents($_FILES['fileimage3p']['tmp_name']));

	$video = addslashes(file_get_contents($_FILES['fileVideo']['tmp_name']));

	$objProducto = new Producto($idProducto, $nombre, $descripcion, $cantidad, $imagen1, 
								$imagen2, $imagen3, $video, $precio, null, $categoria, null);

	if($objProducto->ModificarProducto()){
		header('Location: ../index.php');
	}
	else{
		echo "No se pudo registrar el producto";
	}

?>