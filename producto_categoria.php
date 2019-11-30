<?php 
require_once "procesos/producto_buscarCategoria.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | Busqueda</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require_once "includes/header.php";?>
	<div class="container">
		<br>
	<h3>Resultado de busqueda: </h3>
		<br>
		<div class="row">
		<?php $recibe = $objProducto->BuscarCategoria($cadena);
		 foreach($recibe as $elemento) {?>
		<div class="col-lg-3 col-md-3 mb-3">
			 <div class="card h-100">
			 	<a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>" ><img class="card-img-top" width="250" height="250" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>"></a>
			 	<hr>
			 	<div class="card-body">
	                <h4 class="card-title">  <a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>"> <?php echo $elemento->getNombreProducto() ?> </a> </h4>
	                <h5> Precio: $<?php echo $elemento->getPrecio() ?> </h5>
	                <p class="card-text"> <?php echo $elemento->getDescripcion() ?> </p>
	            </div>
			 </div>
		</div>
		<?php } ?>
		</div>
	</div>
	<br>
	<?php require_once "includes/footer.php";?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src ="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>