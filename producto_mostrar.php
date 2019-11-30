<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | Productos</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php 
	require_once"includes/header.php";
	require_once"procesos/producto_detalles.php";
	?>
	<br>

	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane img-prod active" id="pic-1"><img src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen1());?>" /></div>
						  <div class="tab-pane img-prod" id="pic-2"><img src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen2());?>" /></div>
						  <div class="tab-pane img-prod" id="pic-3"><img src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen3());?>" /></div>
						  <div class="tab-pane img-prod" id="pic-4">
						  <center>
						  	<video controls width="500" height="500" src="data:video/mp4;base64,<?php echo base64_encode($productos->getVideo());?>"></video>
						  	</center>
						  </div>
						</div>
						<br>
						<div class="lista-img">
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img class="img-prod" width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen1());?>" /></a></li> &nbsp;
						  <li><a data-target="#pic-2" data-toggle="tab"><img class="img-prod" width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen2());?>" /></a></li> &nbsp;
						  <li><a data-target="#pic-3" data-toggle="tab"><img class="img-prod" width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($productos->getImagen3());?>" /></a></li> &nbsp;
						  <li><a data-target="#pic-4" data-toggle="tab"><img class="img-prod" width="100" height="100" src="imagenes/video.png" />
						  </a></li> &nbsp;
						</ul>
						</div>
						
					</div>
					<div class="details col-md-6">
						<br>
						<div class="col-md-8">
							<h1 class="product-title"> <?php echo $productos->getNombreProducto() ?> </h1>
							<h4 class="price">Precio: <span> $<?php echo $productos->getPrecio() ?></span></h4>
							<br>
							<p class="product-description"> <?php echo $productos->getDescripcion() ?> </p>
							<p>Calificacion: <?php echo $productos->getCalificacion() ?> </p>
							<form action="procesos/producto_carrito.php" method="POST">
								<label>Disponibles: <?php echo $productos->getUnidades() ?> </label>
								<br>
								<input type="text" class="idOculto" value="<?php echo $productos->getIdProducto() ?>" name="txtId">
								<input type="text" class="idOculto" value="<?php echo $productos->getPrecio() ?>" name="txtPrecio">
								<input type="submit" value="Agregar al carrito" class="btn btn-AltaTec">
							</form>
						</div>
						<br>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="col-md-12">
			<br>
			<h5>Comentarios:</h5>
			<?php foreach($AllComentarios as $elemento) { ?>
			<b> <?php echo $elemento->getNickName(); ?> </b>
			<p> <?php echo $elemento->getComentario(); ?> </p>
			<p class="fechaCom"> Calificacion: <?php echo $elemento->getCalificacion(); ?> </p>
			<?php $fecha = explode(" ", $elemento->getFecha()) ?>
			<p class="fechaCom"> Realizado el <?php echo $fecha[0] ?> a las <?php echo $fecha[1]?> </p> 
			<hr>
			<?php } ?>
		</div>
	</div>
	<?php if($objComentario->revisarComentarios() && $objComentario->getIdUsuario() != null){ ?>
	<div class="container form-registro">
		<br>
		<form action="procesos/comentario_insertar.php" method="POST">
			<div class="col-md-6">
				<textarea cols="110" rows="3" class="inputText" id="textcomentario" 
				placeholder="Deja un comentario..." name="txtComentario"></textarea>
			</div>
			<div class="col-md-4">
				Calificacion:
				<select class="form-control" name="cbCalificacion">
					<option>10</option>
					<option>9</option>
					<option>8</option>
					<option>7</option>
					<option>6</option>
					<option>5</option>
					<option>4</option>
					<option>3</option>
					<option>2</option>
					<option>1</option>
				</select>
			</div>
			<br>
			<div class="col-md-2">
				<input type="text" class="idOculto" value="<?php echo $idProducto; ?>" name="txtIdProd">
				<input type="submit" class="btn btn-AltaTec" value="Enviar" name="">
			</div>
			<br>
		</form>
	</div>
	<?php } ?>
	<br>
	<br>
	<?php require_once("includes/footer.php")?>

	<script src ="Bootstrap/js/jquery.js"></script>
	<script src ="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>