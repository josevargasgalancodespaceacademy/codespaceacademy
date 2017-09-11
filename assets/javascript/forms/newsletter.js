 
function enviar_newsletter(ruta){
        var url = ruta;
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#newsletter").serialize()               
}).done(function(respuesta){

	 var data = JSON.parse(respuesta);
for (var key in data) {

	if (data[key] == "Correo Electronico Invalido" || "Ya has suscrito al newsletter")
		{
          $('.newsletter-email').addClass("errorbox");
          $('.newsletter-email').val("");
          $('.newsletter-email').attr("placeholder", data[key]);
        }
      else 
       {
         $('.newsletter-email').removeClass("errorbox");
       }
}
 
 });
}