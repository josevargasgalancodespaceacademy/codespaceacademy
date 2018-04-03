function enviar_taller_form(){
  var url = "../assets/php/forms/taller.php";
  if ($('#check-taller').is(':checked')){ 
  $.ajax({                        
    type: "POST",                 
    url: url,  
    data: $("#formulario-taller").serialize()                   
  }).done(function(respuesta){
    var postData = $("#formulario-taller").serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.name;
    return obj;
    }, {});
    var originalData = $("#formulario-taller").serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    if( respuesta == "\nOK") {
      $('#modal-taller').modal('show');
    } else {
      var data = JSON.parse(respuesta);
      $('#formulario-taller .mensajerror').css('display', 'inline-block');
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
