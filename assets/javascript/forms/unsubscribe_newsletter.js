function enviar_cancelar_suscripscion(){
	var url ="../assets/php/forms/unsubscribe_newsletter.php";
	$.ajax({                        
		type: "POST",                 
		url: url,  
		data: $("#unsubscribe_newsletter").serialize()                   
	}).done(function(respuesta){
		alert(respuesta);
	});
}