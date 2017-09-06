 
function enviar_newsletter(){
        var url ="assets/php/forms/newsletter.php";
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#newsletter").serialize()                   
});
  }