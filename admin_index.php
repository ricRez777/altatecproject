<?php 
	require_once "procesos/borrador_orderby.php";
?>
<?php
	if(isset($_POST['btnOrdenarP'])){
		$modoP = $_POST['CBOrdenarP'];
		$recibeP = $objArt->MostrarProductos($modoP);
	}
	else{
		$recibeP = $objArt->MostrarProductos(1);	
	}

?>

<div class="container">
	<br>
	<br>
	<div class="container">
	<h2>Administracion de productos</h2>	
	<br>
	<div class="row">
	<div class="col-md-12">
	<div role="tabpanel">
	<ul class="nav nav-tabs">
		<li class="nav-item">
			<a href="#seccion1" class="nav-link active" role="tab"
			data-toggle="tab">Borradores</a>
		</li>

		<li class="nav-item">
			<a href="#seccion2" class="nav-link" role="tab"
			data-toggle="tab">Publicados</a>
		</li>

	</ul>

	<div class="tab-content">
	<div role="tabpanel" class="tab-pane active" id="seccion1">
		<br>
		<form method="POST" action="index.php">
			<table>
				<tr>
					<th><select class="form-control col-md-12" name="CBOrdenar">
						<option value="1">Por nombre</option>
						<option value="2">Mas nuevos</option>
						<option value="3">Mas antiguos</option>
					</select></th>
					<th><input type="submit" value="Ordenar" name="btnOrdenar" class="btn btn-AltaTec"></th>
				</tr>
			</table>
		</form>
		<br>
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Foto 1</th>
			<th>Foto 2</th>
			<th>Foto 3</th>
			<th>Video</th>
			<th></th>
			<th></th>

		</tr>
		<?php 
		foreach($recibe as $elemento) {?>
		<tr>
			<th><?php echo $elemento->getNombreProducto();?></th>
			<th><?php echo $elemento->getDescripcion();?></th>
			<th><?php echo $elemento->getPrecio();?></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>"></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen2());?>"></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen3());?>"></th>
			<th>
				<center>
				<video width="100" height="100" controls src="data:video/mp4;base64,<?php echo base64_encode($elemento->getVideo());?>"></video>
				</center>
			</th>
			<th>
				<form method="POST" action="producto_modificar.php">
				<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto();?>" 
				name="txtIdProductoModificar">
				<input type="submit" class="btn btn-AltaTec" value="Modificar" name="Modificar">
				</form>
			</th>
			<th>
				<form action="procesos/producto_eliminar.php" method="POST">
				<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto();?>" name="txtIdProductoEliminar">
				<input type="submit" class="btn btn-AltaTec" value="Eliminar" name="Eliminar">
				</form>
			</th>
		</tr>
		<?php } ?>
	</table>
	</div>
	<div role="tabpanel" class="tab-pane" id="seccion2">
	<br>
	<form method="POST" action="index.php">
		<table>
			<tr>
				<th><select class="form-control col-md-12" name="CBOrdenarP">
					<option value="1">Por nombre</option>
					<option value="2">Destacados</option>
					<option value="3">Mas nuevos</option>
					<option value="4">Mas antiguos</option>
				</select></th>
				<th><input type="submit" value="Ordenar" name="btnOrdenarP" class="btn btn-AltaTec"></th>
			</tr>
		</table>
	</form>
	<br>
	<table class="table table-striped">
		<tr>
			<th>Nombre</th>
			<th>Descripcion</th>
			<th>Precio</th>
			<th>Calificacion</th>
			<th>Foto 1</th>
			<th>Foto 2</th>
			<th>Foto 3</th>
			<th>Video</th>
			<th></th>
			<th></th>

		</tr>
		<?php 
		foreach($recibeP as $elemento) {?>
		<tr>
			<th><?php echo $elemento->getNombreProducto();?></th>
			<th><?php echo $elemento->getDescripcion();?></th>
			<th><?php echo $elemento->getPrecio();?></th>
			<th><?php echo $elemento->getCalificacion();?></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>"></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen2());?>"></th>
			<th><img width="100" height="100" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen3());?>"></th>
			<th>
				<center>
				<video width="100" height="100" controls src="data:video/mp4;base64,<?php echo base64_encode($elemento->getVideo());?>"></video>
				</center>
			</th>
			<th>
				<form method="POST" action="producto_modificar.php">
				<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto();?>" 
				name="txtIdProductoModificar">
				<input type="submit" class="btn btn-AltaTec" value="Modificar" name="Modificar">
				</form>
			</th>
			<th>
				<form action="procesos/producto_eliminar.php" method="POST">
				<input type="text" class="idOculto" value="<?php echo $elemento->getIdProducto();?>" name="txtIdProductoEliminar">
				<input type="submit" class="btn btn-AltaTec" value="Eliminar" name="Eliminar">
				</form>
			</th>
		</tr>
		<?php } ?>
	</table>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	
	<center>
	<button onclick="location.href='producto_agregar.php'" class="btn btn-AltaTec">Agregar producto</button>
	</center>
	
</div>
<br>