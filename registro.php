<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Registro</title>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">

	<script src="js/jquery-3.4.1.min.js"></script>

	<script src="js/ValidacionRegistro.js"></script>

</head>
<body>
	<?php require_once("includes/header.php") ?>

	<div class="container">
		<br>
		<div class="form-group row">
			<div class="col-md-2"></div>
			<div class="col-md-8 form-registro">
				<form action="procesos/usuario_insertar.php" name="registroUsuario" method="POST" enctype="multipart/form-data">
					<br>
					<h1>Crear cuenta: </h1>
					<br>
					<label class="col-sm-3 col-form-label">Nombre(s): </label>
					<div class="col-sm-11">
					<input type="text" name="txtnombre" class="form-control"> <br>
					</div>

					<label class="col-sm-3 col-form-label">Apellidos(s): </label>
					<div class="col-sm-11">
					<input type="text" name="txtapellido" class="form-control"> <br>
					</div>
					
					<label class="col-sm-3 col-form-label">Correo: </label>
					<div class="col-sm-11">
					<input type="email" required name="txtcorreo" id="correoR" class="form-control regUse"> <br>
					</div>

					<label class="col-sm-3 col-form-label">Nombre de usuario: </label>
					<div class="col-sm-11">
					<input type="text" name="txtnombreusuario" class="form-control"> <br>
					</div>

					<label class="col-sm-8 col-form-label">Contraseña (8 caracteres o mas): </label>
					<div class="col-sm-11">
					<input type="password" minlength="8" required name="txtpassword1" id="pass1" class="form-control regUse"> <br>
					</div>

					<label class="col-sm-4 col-form-label">Confirmar contraseña: </label>
					<div class="col-sm-11">
					<input type="password" minlength="8" required name="txtpassword2" id="pass2" class="form-control regUse"> <br>
					</div>

					<label class="col-sm-3 col-form-label">Foto de usuario: </label>
					<div class="col-sm-11">
					<input type="file" name="fileimage" class=".form-control-file"> <br>
					</div>
					<br>
					<input type="submit" value="¡Registrar!"name="btnRegistrar" class="btn btn-AltaTec">
					<br>
					<br>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		
	</div>
	<br>
	<br>
	<?php require_once("includes/footer.php")?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>