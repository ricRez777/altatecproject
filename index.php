<?php 
require_once"procesos/VerificarSesion.php";
require_once"procesos/usuario_consultar.php";
require_once"procesos/producto_novedades.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | PC GAMERS</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require_once "includes/header.php";

	if(isset($objUsuario)){
		if($objUsuario->getIdUsuario() == 1){
			require_once "admin_index.php";
		}else{
			require_once "usuario_index.php";
		}
	}
	else{
		require_once "usuario_index.php";
	}
	require_once "includes/footer.php";?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src ="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>