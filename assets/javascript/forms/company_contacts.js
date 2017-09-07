function enviar_contacto_company(){
        var url ="../assets/php/forms/company_contacts.php";
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#company_contacts").serialize()                   
}).done(function(respuesta){
       alert(respuesta);
	 });
  }