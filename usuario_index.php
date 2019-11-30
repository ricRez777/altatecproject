	<div class="container">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			  </ol>
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img class="d-block w-100" src="imagenes/carousel/img1.png" alt="First slide">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Innovacion</h5>
			        <p>Los mejores productos</p>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="imagenes/carousel/img2.png" alt="Second slide">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Personalización</h5>
			        <p>Una computadora segun tus necesidades</p>
			      </div>
			    </div>
			    <div class="carousel-item">
			      <img class="d-block w-100" src="imagenes/carousel/img3.png" alt="Third slide">
			      <div class="carousel-caption d-none d-md-block">
			        <h5>Los mejores precios</h5>
			        <p>Los precios mas competitivos de la región</p>
			      </div>
			    </div>
			  </div>
			  <a style="height:50%; transform: translateY(50%);" class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span id="movCarousel" class="sr-only">Previous</span>
			  </a>
			  <a style="height:50%; transform: translateY(50%);"class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span id="movCarousel" class="sr-only">Next</span>
			  </a>
			</div>
			<hr>
		<h2>NOVEDADES</h2>
		<div class="row">
			<?php $recibe = $objProducto->Novedades();
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
		<br>
		<h2>DESTACADOS</h2>
		<div class="row">
			<?php $recibe = $objProducto->Destacados();
			 foreach($recibe as $elemento) {?>
			<div class="col-lg-3 col-md-3 mb-3">
				 <div class="card h-100">
				 	<a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>"><img class="card-img-top" width="250" height="250" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>"></a>
				 	<hr>
				 	<div class="card-body">
		                <h4 class="card-title">  <a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>"> <?php echo $elemento->getNombreProducto() ?> </a> </h4>
		                <h5> Precio: $<?php echo $elemento->getPrecio() ?> </h5>
		                <p class="card-text"> <?php echo $elemento->getDescripcion() ?> </p>
		            </div>
		            <!--<input type="button" name="agregarcarr" onclick="window.open('carrito.php', '_self')"  value="Agregar a carrito" class=" btn btn-AltaTec">-->
				 </div>
			</div>
			<?php } ?>
		</div>
		<!--
		<h2>MAS COMPRADOS</h2>
		<div class="row">
			<?php $recibe = $objProducto->Destacados();
			 foreach($recibe as $elemento) {?>
			<div class="col-lg-3 col-md-3 mb-3">
				 <div class="card h-100">
				 	<a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>"><img class="card-img-top" width="250" height="250" src="data:image/jpg;base64,<?php echo base64_encode($elemento->getImagen1());?>"></a>
				 	<hr>
				 	<div class="card-body">
		                <h4 class="card-title">  <a href="producto_mostrar.php?id=<?=$elemento->getIdProducto()?>"> <?php echo $elemento->getNombreProducto() ?> </a> </h4>
		                <h5> Precio: $<?php echo $elemento->getPrecio() ?> </h5>
		                <p class="card-text"> <?php echo $elemento->getDescripcion() ?> </p>
		            </div>
		            <input type="button" name="agregarcarr" onclick="window.open('carrito.php', '_self')"  value="Agregar a carrito" class=" btn btn-AltaTec">
				 </div>
			</div>
			<?php } ?>
		</div>
		-->
	</div>
	<br>
	<br>