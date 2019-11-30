<?php 
	require_once "../db/chat.php";

	session_start();
	if(isset($_SESSION['idusuario'])){	

		$idUse = $_SESSION['idusuario'];
	}

	if(isset($_POST['txtIdProd'])){
		$idProd = $_POST['txtIdProd'];
	}
	else{
	$idProd = $_GET['IdP'];	
	$idUs = $_GET['IdU'];
	}

	$objChat = new Chat(null, null, $idUs, null, $idProd, null);

	$mensajes = array();

	$mensajes = $objChat->MostrarChat();
	
	foreach($mensajes as $elemento) { ?>
	<div id="datos-chat">
		<span class="name"><?php echo $elemento->getNickName();?>: </span>
		<span><?php echo $elemento->getMensaje();?></span>
	</div>
	<?php } ?>