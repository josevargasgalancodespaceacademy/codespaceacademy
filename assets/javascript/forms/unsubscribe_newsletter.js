function enviar_cancelar_suscripscion(){
	var url ="../assets/php/forms/unsubscribe_newsletter.php";
	$.ajax({                        
		type: "POST",                 
		url: url,  
		data: $("#unsubscribe_newsletter").serialize()                   
	}).done(function(respuesta){
		if(respuesta == "OK")
	   {
		   $('#subscriber_details').removeClass("errorbox");
           $('#subscriber_details').val("");
           $('#subscriber_details').attr("placeholder", " ");  
           $('#modal-cancelar-suscripcion').modal('show');
       }
		else
		{
		var response = JSON.parse(respuesta);
		if (response.hasOwnProperty('email'))
		{
          $('#subscriber_details').addClass("errorbox");
          $('#subscriber_details').val("");
          $('#subscriber_details').attr("placeholder", response['email']);
        }
        else if (response.hasOwnProperty('general'))
       {
          $('#subscriber_details').addClass("errorbox");
          $('#subscriber_details').val("");
          $('#subscriber_details').attr("placeholder", response['general']);  
       }
   }
	});
}