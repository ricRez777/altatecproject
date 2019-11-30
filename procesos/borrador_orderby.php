<?php 
	$objArt = new Producto(null, null, null, null, null, null, null, null, null, null, null, null);
	if(isset($_POST['btnOrdenar'])){
		$modo = $_POST['CBOrdenar'];
		$recibe = $objArt->MostrarBorradores($modo);
	}
	else{
		$recibe = $objArt->MostrarBorradores(1);	
	}

?>
