<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | Carrito</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>
<body>
	<?php 
	require_once "includes/header.php";
	require_once "db/carrito.php";

	if(isset($_SESSION['idusuario'])){
			$idUse = $_SESSION['idusuario'];
	}
	$objCarrito = new Carrito(null, null, null, null, null, null, null, null, null, null, null, null);
	?>
	<br>
	<br>
	<div class="container">
		<h1>Mis productos</h1>
		<br>
		<div class="row">
			<div class="col-md-12">	
				<div role="tabpanel">
					
					<ul class="nav nav-tabs">
						<li class="nav-item">
							<a href="#seccion1" class="nav-link active" role="tab"
							data-toggle="tab">Carrito</a>
						</li>

						<li class="nav-item">
							<a href="#seccion2" class="nav-link" role="tab"
							data-toggle="tab">Historial de compra</a>
						</li>

					</ul>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="seccion1">
							<table class="table table-striped">
								<tr>
									<th>Quitar</th>
									<th>Imagen</th>
									<th>Nombre producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Total</th>
									<!--<th></th>-->
									<th></th>
								</tr>
								<?php $recibe = $objCarrito->MostrarCarrito($idUse);
								foreach($recibe as $elemento) {?>
								<tr>
									<td>
										<form action="procesos/carrito_quitar.php" method="POST">
											<input type="text" class="idOculto" value="<?php echo $elemento->getIdCompra() ?>" 
											name="txtIdCompra">
											<input type="submit" class="btn btn-AltaTec" value="Quitar" name="">
										</form>
									</td>
									<td><img width="50" height="50" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>">
									</td>
									<td> <?php echo $elemento->getNombreArticulo();?> </td>
									<th>
										<select class="form-control">
										<?php $i = 0;
										while ($i < $elemento->getDisponibles()){ ?>
											<option> <?php echo $i + 1; ?> </option>
										<?php $i = $i + 1; } ?>
										</select>
									</th>
									<th> <?php echo $elemento->getPrecio(); ?> </th>
									<th> <?php echo $elemento->getCantidad() * $elemento->getPrecio(); ?> </th>
								
									<!--<th>
										<form action="chat_mostrar.php" method="GET">
											<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto(); ?>"
											name="txtIdP">
											<input type="submit" class="btn btn-AltaTec" value="Negociar" name="">
										</form>
									</th>-->
									<th>
										<form action="procesos/carrito_comprar.php" method="POST">
											<input type="text" class="idOculto" value="<?php echo $elemento->getIdCompra() ?>" 
											name="txtIdCompra">
											<input type="submit" class="btn btn-AltaTec" value="Comprar" name="">
										</form>
									</th>
								</tr>
								<?php } ?>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane" id="seccion2">
							<table class="table table-striped">
								<tr>
									<th>Imagen</th>
									<th>Nombre producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Total</th>
									<th>Fecha</th>
								</tr>
								<?php $recibe = $objCarrito->MostrarHistorial($idUse);
								foreach($recibe as $elemento) {?>
								<tr>
									<td><img width="50" height="50" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>">
									</td>
									<td> <?php echo $elemento->getNombreArticulo();?> </td>
									<th> <?php echo $elemento->getCantidad() ?> </th>
									<th> <?php echo $elemento->getPrecio(); ?> </th>
									<th> <?php echo $elemento->getCantidad() * $elemento->getPrecio(); ?> </th>
									<th> <?php 
									$fecha = explode(" ", $elemento->getFechaCompra());
									echo $fecha[0];
									?> </th>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<?php require_once"includes/footer.php";?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src ="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>