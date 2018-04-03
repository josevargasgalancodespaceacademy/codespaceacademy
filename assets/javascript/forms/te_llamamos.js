function enviar_llamamos_form(){
          var url ="assets/php/forms/te_llamamos.php";
  if ($('#check-llamamos').is(':checked')){ 
  $.ajax({                        
    type: "POST",                 
    url: url,  
    data: $("#formulario-llamamos").serialize()                   
  }).done(function(respuesta){
    var postData = $("#formulario-llamamos").serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.name;
    return obj;
    }, {});
    var originalData = $("#formulario-llamamos").serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    if( respuesta == "\nOK") {
      $('#modal-te-llamamos').modal('show');
    } else {
      var data = JSON.parse(respuesta);
      $('#formulario-llamamos .mensajerror').css('display', 'inline-block');
      for (var key in postData) {
        for (var key2 in data){
          if (postData[key] == key2) {
            $('#'+ key).addClass("errorbox");
            $('#' + key).attr("placeholder", data[key]);  
            $('#' + key).val("");
            replaceValueTimeout('#'+ key,originalData[key]);
            break
          } else {  
            $('#'+ key).off('focus');
            $('#'+ key).removeClass("errorbox");
            $('#' + key).attr("placeholder", ""); 
          }
        }
      }
    }
  })
}else
  {
    swal("Acepta las condiciones legales", "", "error");
  }
}
