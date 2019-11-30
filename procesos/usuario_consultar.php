<?php 

	require_once "db/Usuario.php";

	if (isset($_SESSION['idusuario'])){ 

		$idUsuarioTemp = $_SESSION['idusuario']; //obtenemos el id del usuario que esta logeado
		
		$objUsuario = new Usuario($idUsuarioTemp, "", "", "", "", null);

		$objUsuario->ConsultarDatos();

	}

?>