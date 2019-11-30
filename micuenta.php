<!DOCTYPE html>
<html>
<head>
	<title>Mi cuenta</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require_once("includes/header.php");?>
	<br>
	<?php require_once("procesos/usuario_consultar.php");?>
	<div class="container">
		<div class="col-md-2"></div>
		<center>
		<div class="col-md-8 form-registro">
			<br>
			<h1>Mis datos</h1>
			<br>
			<div class="row">
				<div class="col-md-6">
					<label>Foto:</label>&nbsp;&nbsp;&nbsp;&nbsp;
					<img width="200" height="200" src="data:image/jpg;base64,<?php echo base64_encode( $objUsuario->getImagen());?>"><br>
				</div>
				<div class="col-md-6">
					<br><br>
					<label><b>Nombre de usuario: </b><?php echo $objUsuario->getNickName(); ?> </label><br>
					<label><b>Nombre completo:</b> <?php echo $objUsuario->getNombreCompleto(); ?></label><br>
					<label><b>Correo: </b><?php echo $objUsuario->getCorreo(); ?> </label><br>
				</div>
			</div>
			<br>
			<!--<div class="row">
				<div class="col-md-12">
					<h4>Direccion:</h4>
					<label>Direccion aun no disponible</label>
					<input type="button" onclick="location.href='producto_agregar.php'" value="Agregar direccion" name="btnIrDireccion" class="btn btn-AltaTec">
				</div>
			</div>-->
			<br>
		</div>
		</center>
		<div class="col-md-2"></div>
	</div>
	<br>
	<br>
	<?php require_once("includes/footer.php")?>
	<script src ="Bootstrap/js/jquery.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>