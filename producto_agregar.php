<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | PC GAMERS</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php require_once("includes/header.php");
	require_once ("procesos/categoria_consultar.php");?>
	<script>
		$(document).ready(function(){
			$('#r1').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('computadora'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r2').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('hardware'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r3').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('accesorios'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r4').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('almacenamiento'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r5').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('electronica'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r6').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('red'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r7').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('software'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

			$('#r8').click(function(){
				$('select').empty();
				<?php $recibe = $objCategoria->categoriasPorTipo('impresion'); 
				foreach($recibe as $elemento) { 
				$porcion = explode(" ", $elemento); ?>
				$("#categoria").append("<option value='<?php echo $porcion[0] ?>'>" + "<?php echo $porcion[1] ?>" + "</option>" );
			<?php } ?>
			});

		});
	</script>
	<br>
	<div class="container">
		<div class="form-group row">
			<div class="col-md-2"></div>
			<div class="col-md-8 form-registro">
				<form action="procesos/producto_insertar.php" name="registroUsuario" method="POST" enctype="multipart/form-data">
					<br>
					<h1>Registrar producto: </h1>
					<br>
					<label class="col-sm-8 col-form-label">Nombre del articulo: </label>
					<div class="col-sm-11">
					<input type="text" required name="txtnombreProducto" class="form-control"> <br>
					</div>

					<label class="col-sm-3 col-form-label">Descripcion: </label>
					<div class="col-sm-11">
					<input type="text" name="txtDescripcion" class="form-control"> <br>
					</div>
					
					<label class="col-sm-8 col-form-label">Precio sugerido: </label>
					<div class="col-sm-11">
					<input type="text" name="txtPrecio" class="form-control"> <br>
					</div>

					<label class="col-sm-8 col-form-label">Cantidad en almacen: </label>
					<div class="col-sm-11">
					<input type="text" name="txtCantidad" class="form-control"> <br>
					</div>
					
					<label class="col-sm-3 col-form-label">Tipo: </label>
					<div class="col-sm-11">
						<div class="row">
							<div class="col-md-5">
								<input id="r1" type="radio" name="tipo" value="Computadoras"> Computadoras <br>
								<input id="r2" type="radio" name="tipo" value="Hardware"> Hardware <br>
								<input id="r3" type="radio" name="tipo" value="Accesorios"> Accesorios <br>
								<input id="r4" type="radio" name="tipo" value="Almacenamiento"> Almacenamiento <br>
								<input id="r5" type="radio" name="tipo" value="Electronica"> Electronica <br>
								<input id="r6" type="radio" name="tipo" value="Redes"> Redes <br> 	
								<input id="r7" type="radio" name="tipo" value="Software"> Software <br>
								<input id="r8" type="radio" name="tipo" value="Impresion"> Impresion <br>
							</div>
							<div class="col-md-7">
								<label class="col-sm-3 col-form-label">Categoria</label>
								<select id="categoria" name="cbCategoria" class="form-control"></select>
							</div>
						</div>
					</div>

					<label class="col-sm-3 col-form-label">Fotos de producto: </label>
					<div class="col-sm-11">
					<input type="file" name="fileimage1p" class=".form-control-file"> <br>
					<input type="file" name="fileimage2p" class=".form-control-file"> <br>
					<input type="file" name="fileimage3p" class=".form-control-file"> <br>
					</div>

					<label class="col-sm-3 col-form-label">Video: </label>
					<div class="col-sm-11">
					<input type="file" name="fileVideo" class=".form-control-file"> <br>
					</div>

					<br>
					<input type="submit" value="Publicar"name="btnPublicar" class="btn btn-AltaTec">
					<input type="submit" value="Guardar borrador"name="btnBorrador" class="btn btn-AltaTec">
					<br>
					<br>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>

	<br>
	<?php require_once("includes/footer.php");?>
</body>
</html>