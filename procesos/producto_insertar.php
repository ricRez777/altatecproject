<?php 
	require_once "../db/producto.php";

	if(isset($_POST['btnPublicar'])){
		$nombre = $_POST['txtnombreProducto'];
		$descripcion = $_POST['txtDescripcion'];
		$precio = $_POST['txtPrecio'];
		$cantidad = $_POST['txtCantidad'];

		$categoria = $_POST['cbCategoria'];
		$imagen1 = addslashes(file_get_contents($_FILES['fileimage1p']['tmp_name']));
		$imagen2 = addslashes(file_get_contents($_FILES['fileimage2p']['tmp_name']));
		$imagen3 = addslashes(file_get_contents($_FILES['fileimage3p']['tmp_name']));

		$video = addslashes(file_get_contents($_FILES['fileVideo']['tmp_name']));

		$objProducto = new Producto(null, $nombre, $descripcion, $cantidad, $imagen1, 
									$imagen2, $imagen3, $video, $precio, null, $categoria, null);

		if($objProducto->InsertarProducto()){
			header('Location: ../index.php');
		}
		else{
			echo "No se pudo registrar el producto";
		}
	}

	if(isset($_POST['btnBorrador'])){
		$nombre = $_POST['txtnombreProducto'];
		$descripcion = $_POST['txtDescripcion'];
		$precio = $_POST['txtPrecio'];
		$cantidad = $_POST['txtCantidad'];
		
		try {
			$categoria = $_POST['cbCategoria'];

			if($_FILES['fileimage1p'] != null){
				$imagen1 = addslashes(file_get_contents($_FILES['fileimage1p']['tmp_name']));
			}
			if($_FILES['fileimage2p'] != null){
				$imagen2 = addslashes(file_get_contents($_FILES['fileimage2p']['tmp_name']));
			}
			if($_FILES['fileimage3p'] != null){
				$imagen3 = addslashes(file_get_contents($_FILES['fileimage3p']['tmp_name']));
			}
			if($_FILES['fileVideo'] != null){
				$video = addslashes(file_get_contents($_FILES['fileVideo']['tmp_name']));
			}
			$objProducto = new Producto(null, $nombre, $descripcion, $cantidad, $imagen1, 
										$imagen2, $imagen3, $video, $precio, null, $categoria, null);

			if($objProducto->InsertarBorrador()){
				header('Location: ../index.php');
			}
			else{
				echo "No se pudo registrar el producto";
			}

		} catch (Exception $e) {

			$categoria = 0;

			$imagen1 = null;
			$imagen2 = null;
			$imagen3 = null;
			$video = null;

			$objProducto = new Producto(null, $nombre, $descripcion, $cantidad, $imagen1, 
										$imagen2, $imagen3, $video, $precio, null, $categoria, null);

			if($objProducto->InsertarBorrador()){
				header('Location: ../index.php');
			}
			else{
				echo "No se pudo registrar el producto";
			}
			
		}
		
	}



?>