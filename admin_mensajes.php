<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | Mensajes </title>

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
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="seccion1">
							<table class="table table-striped">
								<tr>
									<th>Usuario</th>
									<th>Imagen</th>
									<th>Producto</th>
									<th>Cantidad</th>
									<th>Precio</th>
									<th>Total</th>
									<th></th>
								</tr>
								<?php $recibe = $objCarrito->MensajesAdmin();
								foreach($recibe as $elemento) {?>
								<tr>
									<td>
										<!-- Aqui va el nickname-->
										<?php echo $elemento->getNickName();?>
									</td>

									<td><img width="50" height="50" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>">
									</td>
									
									<td> <?php echo $elemento->getNombreArticulo();?> </td>

									<th> <?php echo $elemento->getCantidad()?> </th>
									
									<th>
									<form method="POST" action="procesos/carrito_modificar.php"> 
										<input type="text" value="<?php echo $elemento->getPrecio();?>" 
										name="txtPrecioMod">  
										<input type="text" class="idOculto" 
										value="<?php echo $elemento->getIdUsuario(); ?>" name="txtIdUsuario">
										<input type="text" class="idOculto" 
										value="<?php echo $elemento->getIdCompra(); ?>" name="txtIdCompra">
										<input type="submit" class="btn btn-AltaTec" value="Modificar" name="btnModificarPrecio">
									</form>
									</th>
								
									<th>
										<form action="chat_mostrar.php" method="GET">
											<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto(); ?>" name="txtIdP">
											<input type="text" class="idOculto" value="<?php echo $elemento->getIdUsuario(); ?>" name="txtIdU">
											<input type="submit" class="btn btn-AltaTec" value="Negociar" name="">
										</form>
									</th>
									<th>

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