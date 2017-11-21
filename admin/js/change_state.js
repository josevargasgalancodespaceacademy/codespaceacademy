function change_state(id){
  var url = "php/change_state.php";
      var id_row = id;
        data = new FormData($('#'+id_row)[0]);
        data.append('id',id_row);
  $.ajax({                        
    type: "POST",                 
    url: url,  
    data: data                   
  }).done(function(respuesta){
    var postData = $("#change_state").serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.name;
    return obj;
    }, {});
    var originalData = $("#change_state").serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    if( respuesta == "\nOK") {
      alert("Estado cambiado");
    } else {
      var data = JSON.parse(respuesta);
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
