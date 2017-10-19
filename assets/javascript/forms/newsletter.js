 
function enviar_newsletter(ruta){
        var url = ruta;
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#newsletter").serialize()               
}).done(function(respuesta){
   var originalData = $("#newsletter").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
if(respuesta === OK)
     {
           $('.newsletter-email').removeClass("errorbox");
           $('.newsletter-email').val("");
           $('.newsletter-email').attr("placeholder", " ");  
           $('#modal-newsletter').modal('show');
    }
    else
       {
	 var data = JSON.parse(respuesta);
	if (data.hasOwnProperty('email'))
		{
          $('.newsletter-email').addClass("errorbox");
          $('.newsletter-email').val("");
          $('.newsletter-email').attr("placeholder", data['email']);
          replaceValueTimeout('.newsletter-email',originalData['email']);
    }
     else if (data.hasOwnProperty('general'))
    {
          $('.newsletter-email').addClass("errorbox");
          $('.newsletter-email').val("");
          $('.newsletter-email').attr("placeholder", data['general']);
          replaceValueTimeout('.newsletter-email',originalData['general']);
    }
      else 
       {
        $('.newsletter-email').off('focus');
         $('.newsletter-email').removeClass("errorbox");
       }
 }
 });
}
