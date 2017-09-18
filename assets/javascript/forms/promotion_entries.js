function enviar_sorteo_becas(){
        var url ="../assets/php/forms/promotion_entries.php";
if ($('#check-sorteo').is(':checked')){ 
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#promotion_entries").serialize()                   
}).done(function(respuesta){
  var postData = $("#promotion_entries").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.name;
            return obj;
        }, {});
   var originalData = $("#promotion_entries").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
  if( respuesta == "OK")
  {
    $('#modal-sorteo').modal('show');
  }
  else
  {
	var data = JSON.parse(respuesta);
    $('#promotion_entries .mensajerror').css('display', 'inline-block');
  for (var key in postData) {
    for (var key2 in data){
  if (postData[key] == key2)
  {
    if(key =="date_of_birth")
      { 
       $('#'+ key).addClass("errorbox");
       break
      }
    else
    {
     $('#'+ key).addClass("errorbox");
     $('#' + key).attr("placeholder", data[key]);  
     $('#' + key).val("");
     replaceValueTimeout('#'+ key,originalData[key]);
     break
    }
  } 
  else
  {   if(key =="date_of_birth")
      { 
       $('#'+ key).removeClass("errorbox");
       $('#' + key).attr("placeholder", ""); 
      }
      else
      {
     $('#'+ key).off('focus');
     $('#'+ key).removeClass("errorbox");
     $('#' + key).attr("placeholder", ""); 
   }  
  }
}
}
}
})
  }else{
    alert ('Acepta las condiciones legales');
  }
}