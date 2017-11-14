function enviar_work_offer(){
  var url = "php/work_offers.php";
  $.ajax({                        
    type: "POST",                 
    url: url,  
    data: $("#formulario-ofertas-trabajo").serialize()                   
  }).done(function(respuesta){
    var postData = $("#formulario-ofertas-trabajo").serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.name;
    return obj;
    }, {});
    var originalData = $("#formulario-ofertas-trabajo").serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    console.log(respuesta);
    if( respuesta == "\nOK") {
      $('#modal-ofertas-trabajo').modal('show');
    } else {
      var data = JSON.parse(respuesta);
      $('#formulario-ofertas-trabajo .mensajerror').css('display', 'inline-block');
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
}
