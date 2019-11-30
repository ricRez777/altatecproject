<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | LOGIN</title>
	
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css" crossorigin="anonymous">

	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	
	<?php require_once("includes/header.php") ?>
	
	<div class="container">
		<br>
		<div class="row form-registro">
			<div class="col-md-6">
				<form action="procesos/InicioDeSesion.php" method="POST">
					<div class="form-group">
						<br>
						<h3>Inicio de sesion</h3><br>
						<input type="text" class="form-control" placeholder="Correo electronico" name="correoL"><br><br>
						<input type="password" class="form-control" placeholder="Contraseña" name="passL"><br><br>
						<input type="submit" class="btn btn-AltaTec" value="Entrar" name="entrar"><br>
					</div>
				</form>
			</div>
			<div class="col-md-6">
				<br><br>
				<h3>¿Eres nuevo cliente?</h3>
				<p>Con una cuenta podras hacer compras mas rapidas y tener un mejor control de los pedidos que realices.</p>
				<h4><span><a href="registro.php">¡Registrate ahora!</a></span></h4>
			</div>
		</div>
	</div>
	<br><br><br>
	<?php require_once("includes/footer.php") ?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>