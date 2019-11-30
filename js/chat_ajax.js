function ajax(){
	var req = new XMLHttpRequest();

	req.onreadystatechange = function(){
		if(req.readyState == 4 && req.status == 200){
			document.getElementByID('chat').innerHTML = req.responseText; 
		}
	}
	req.open('GET', 'chat_cargar.php', true);
	req.send();
}

//linea que hace que se refresque la pantalla
setInterval(function(){ajax();}, 1000);