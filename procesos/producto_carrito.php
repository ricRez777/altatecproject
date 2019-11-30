<?php 
require_once "../db/carrito.php";

session_start();
	
	if(isset($_SESSION['idusuario'])){	
		$idUse = $_SESSION['idusuario'];
	}
	$idProducto = $_POST['txtId'];
	$precio = $_POST['txtPrecio'];
	$hoy = date("Y-m-d H:i:s");
	/*Forma de pago enviamos un 1 el cual quiere decir que no esta definido*/
	/*En el parametro status enviamos un 1 que quiere decir que esta en el carrito solamente*/
	$objCarrito = new Carrito($idUse, $idProducto, $hoy, 1, 1, 1, $precio, null, null, null, null, null);

	echo $idUse . " " .  $idProducto . " " . $precio . " " . $hoy;

	if($objCarrito->InsertarCarrito()){
		//echo $idUse . " " .  $idProducto . " " . $cantidad . " " . $precio . " " . $hoy;
		header('Location: ../carrito_mostrar.php');
	}
	else{
		echo "ERROR: no se puede agregar al carrito";
	}


?>