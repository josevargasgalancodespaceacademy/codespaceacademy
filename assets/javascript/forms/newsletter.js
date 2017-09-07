 
function enviar_newsletter(ruta){
        var url = ruta;
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#newsletter").serialize()               
}).done(function(respuesta){
	 alert (respuesta);
});
  }