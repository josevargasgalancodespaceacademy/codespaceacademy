 
function enviar_newsletter(ruta){
        var url = ruta;
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#newsletter").serialize()               
}).done(function(respuesta){
if(respuesta == "OK")
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
        }
      else 
       {
         $('.newsletter-email').removeClass("errorbox");
       }
 }
 });
}