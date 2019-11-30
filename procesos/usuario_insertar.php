<?php 

	require_once "../db/usuario.php";

	$NombreCompleto = $_POST['txtnombre'] . " " . $_POST['txtapellido'];
	$PassHash = password_hash($_POST['txtpassword2'], PASSWORD_DEFAULT);
	$imagen = addslashes(file_get_contents($_FILES['fileimage']['tmp_name']));
	
	$objUsuario = new Usuario(0, $NombreCompleto, $_POST['txtcorreo'], $_POST['txtnombreusuario'], $PassHash, $imagen);
	
	if($objUsuario->VerificarCorreoUnico()){
		echo "Ya existe una cuenta con este correo electronico";
		header('Location: ../registro.php');
	}
	else{
		if($objUsuario->InsertarUsuario($imagen)){
			echo "Se inserto el usuario";
			header('Location: ../index.php');
		}
		else{
			echo "Error no se pudo insertar el usuario";
		}
	}

?>