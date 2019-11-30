<?php 
	require_once "procesos/VerificarSesion.php";
	require_once "procesos/categoria_consultar.php";
	require_once "procesos/usuario_consultar.php";
?>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/styleheader.css">
</head>
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-7">
				<a href="index.php" class="navbar-brand"> <img src="imagenes/logo.png" height="70" width="200"> </a>
			</div>
			
			<div class="col-md-5" id="div-Cuentas">
				<div class="links">
				<div class="row">
					<table class="table">
						<tr>
							<?php if (!isset($idUse)) { ?>
							<th><span><a href="registro.php">Registrate</a></span></th>
							<th><span><a href="login.php">Mi cuenta</a></span></th>
							<?php  } else {
								if($idUse != 1){?>
							<th><span><a href="carrito_mostrar.php">Carrito</a></span></th>
							<?php } else{ ?>
							<th><span><a href="admin_mensajes.php">Mensajes</a></span></th>
							<?php } ?>
							<th><span><a href="procesos/CerrarSesion.php">Cerrar sesión</a></span></th>
							<th><span><a href="micuenta.php"><img width="25" height="25" src= "data:image/jpg;base64,<?php echo base64_encode($objUsuario->getImagen()); ?>" ></a></span></th>
							<?php } ?>
						</tr>
					</table>
				</div>
				<div class="row busqueda">
					<form action="producto_resultado.php" method="POST" class="navbar-form navbar-left" 
					role="search">
							<input type="text" class="inputText" id="caja_busqueda" placeholder="Que necesitas?" 
							name="caja_busqueda">
							<input type="submit" class=" btn btn-AltaTec" value="Buscar" name="btnSearch">
					</form>
				</div>
				</div>
			</div>
		</div>

		<br>
			<nav class="navbar navbar-default" id="navCategorias">
				<div class="container">
					<div class="col-md-12">
						<ul class="ulNav">
							<li><a href="#">Computadoras</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('computadora');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Hardware</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('hardware');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Accesorios</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('accesorios');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Almacenamiento</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('almacenamiento');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Electronica</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('electronica');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Redes</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('red');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Software</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('software');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>
							<li><a href="#">Impresion</a>
								<ul>
									<?php 
									$recibe = $objCategoria->categoriasNav('impresion');

									foreach ($recibe as $elemento){ ?>
										<li><a href="producto_categoria.php?Cat=<?=$elemento->getIdCategoria()?>">
											<?php echo $elemento->getNombreCategoria()?>
										</a></li>
									<?php
									}
									?>
								</ul>
							</li>	
						</ul>
					</div>
				</div>
			</nav>
			<div id="datos">
				
			</div>
	</div>
</header>