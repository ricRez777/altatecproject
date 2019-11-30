<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Altatec Monterrey | Chat</title>

	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="Bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/stylechat.css">
	<?php 
	if(isset($_GET['txtIdP'])){
		$idProd = $_GET['txtIdP']; 
		$idUse = $_GET['txtIdU'];
	}
	?>
	<script type="text/javascript">
		function ajax(){
			var req = new XMLHttpRequest();

			req.onreadystatechange = function(){
				if(req.readyState == 4 && req.status == 200){
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'procesos/chat_cargar.php?IdP=<?=$idProd?>&IdU=<?=$idUse?>', true);
			req.send();
		}
	//Linea que hace que se refresque la pantalla
		setInterval(function(){ajax();}, 1000);
	</script>

</head>
<body onload="ajax();">
	<?php 
	require_once "includes/header.php"; 
	require_once "db/chat.php";
	//require_once "procesos/chat_mostrar.php";

	if(isset($_SESSION['idusuario'])){	

		$idUse = $_SESSION['idusuario'];
	}

	if(isset($_POST['txtmensaje'])){

		$idProd = $_POST['txtIdP'];
		$mensaje = $_POST['txtmensaje'];

		$objInsertChat = new Chat(null, $mensaje, $idUse, null, $idProd, null); 
		$objInsertChat->InsertarMensaje();
	}
	?>
	<br>
	<div class="container">
	
	<br>
	<div id="contenedor">
		<div id="caja-chat">
			<div id="chat">
				
			</div>
		</div>
		<form action="chat_mostrar.php" method="POST">
			<textarea name="txtmensaje" rows="2" placeholder="Escribe el mensaje"></textarea>
			<input class="idOculto" type="text" name="txtIdP" value="<?php echo $idProd ?>">
			
			<input id="inp" type="submit" name="btnMensajeEnviar" value="Enviar">
		</form>
	</div>
	</div>
	<br>

	<?php require_once"includes/footer.php"; ?>
	<script src ="Bootstrap/js/jquery.js"></script>
	<script src ="Bootstrap/js/bootstrap.min.js"></script>
</body>
</html>