<?php 

	session_start();
	
	if(isset($_SESSION['idusuario'])){	

		$idUse = $_SESSION['idusuario'];
		$imagenUse = $_SESSION['imagenUse'];
	}

?>