<?php 
	require_once "../db/comentario.php";

	session_start();
	
	if(isset($_SESSION['idusuario'])){
		$idUse = $_SESSION['idusuario'];
	}

	$comentario = $_POST['txtComentario'];
	$calificacion = $_POST['cbCalificacion'];
	$idProducto = $_POST['txtIdProd'];
	$hoy = date("Y-m-d H:i:s");

	$objComentario = new Comentario(null, $idUse, $idProducto, $calificacion, $comentario, $hoy);

	if($objComentario->InsertarComentario()){
		header('Location: ../producto_mostrar.php?id=' . $idProducto);
	}
	else{
		echo "no se pudo insertar al comentario";
	}

?>