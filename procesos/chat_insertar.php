<?php 
	require_once "../db/chat.php";

	session_start();
	if(isset($_SESSION['idusuario'])){	

		$idUse = $_SESSION['idusuario'];
	}

	if(isset($_POST['txtmensaje'])){

		$idProd = $_POST['txtIdP'];
		$mensaje = $_POST['txtmensaje'];

		$objInsertChat = new Chat(null, $mensaje, $idUse, null, $idProd, null); 
		$objInsertChat->InsertarMensaje();
	}
	/*if($objInsertChat->InsertarMensaje()){
		header('Location: ../chat_mostrar.php');
	}
	else{
		echo "No se pudo insertar el mensaje\n";
		echo $idProd . " " . $idUse  . " " . $mensaje;
	}*/
?>