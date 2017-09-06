function enviar_sorteo_becas(){
        var url ="../assets/php/forms/promotion_entries.php";
        var datos =$("#promotion_entries").serialize();
        alert (datos)    ;
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#promotion_entries").serialize()                   
});
  }