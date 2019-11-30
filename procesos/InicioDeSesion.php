<?php 

	session_start();
	
	require_once ("../db/Usuario.php");

	$objUsuario = new Usuario(0,"", $_POST['correoL'], $_POST['correoL'], $_POST['passL'], "");



	if($objUsuario->InicioDeSesion()){
		$_SESSION['idusuario'] = $objUsuario->getIdUsuario();
		$_SESSION['imagenUse'] = $objUsuario->getImagen();
		header('Location: ../index.php');
	}
	else{
		echo "Acceso denegado";
		header('Location: ../login.php');
	}

?>
