
$(document).ready(function(){

	var formularioRegUse = document.registroUsuario;

	$('#pass2').keyup(function(){

		var pass1 = $('#pass1').val();
		var pass2 = $('#pass2').val();

		if(pass1 == pass2){
			$('#pass2').css("background", "#39C760");
		}
		else{
			$('#pass2').css("background", "#F04A37");	
		}

	});

});