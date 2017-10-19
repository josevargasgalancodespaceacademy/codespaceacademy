function enviar_cancelar_suscripscion(){
	var url ="../assets/php/forms/unsubscribe_newsletter.php";
	$.ajax({                        
		type: "POST",                 
		url: url,  
		data: $("#unsubscribe_newsletter").serialize()                   
	}).done(function(respuesta){
		var originalData = $("#unsubscribe_newsletter").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
         }, {});
		if(respuesta == "\nOK")
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
          replaceValueTimeout('#subscriber_details',originalData['email']);
        }
        else if (response.hasOwnProperty('general'))
       {
          $('#subscriber_details').addClass("errorbox");
          $('#subscriber_details').val("");
          $('#subscriber_details').attr("placeholder", response['general']);
          replaceValueTimeout('#subscriber_details',originalData['email']);  
       }
   }
	});
}
