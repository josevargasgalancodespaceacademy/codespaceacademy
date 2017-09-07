function enviar_sorteo_becas(){
        var url ="../assets/php/forms/promotion_entries.php";
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#promotion_entries").serialize()                   
}).done(function(respuesta){
	 alert (respuesta);
});
  }