function enviar_curriculum(){
        var url ="../assets/php/forms/curriculums.php";

if ($('#check-cv').is(':checked')){ 
        $.ajax({                        
          url: url,
          type: 'POST',

          data: new FormData($('#curriculums')[0]),

          cache: false,
          contentType: false,
          processData: false,

          // Custom XMLHttpRequest
          xhr: function() {
              var myXhr = $.ajaxSettings.xhr();
              if (myXhr.upload) {
                  myXhr.upload.addEventListener('progress', function(e) {
                      if (e.lengthComputable) {
                          $('progress').attr({
                              value: e.loaded,
                              max: e.total,
                          });
                      }
                  } , false);
              }
              return myXhr;
          },                
          }).done(function(respuesta){
          var postData = $("#curriculums").serializeArray().reduce(function(obj, item) {
          obj[item.name] = item.name;
          return obj;
        }, {});
          var originalData = $("#curriculums").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.value;
            return obj;
        }, {});
  if( respuesta == "OK")
  {
    $('#modal-cv').modal('show');
  }
  else
  {
  var data = JSON.parse(respuesta);
    $('#curriculums .mensajerror').css('display', 'inline-block');
  for (var key in postData) {
    for (var key2 in data){
  if (postData[key] == key2)
  {
     $('#'+ key).addClass("errorbox");
     $('#' + key).attr("placeholder", data[key]);  
     $('#' + key).val("");
     replaceValueTimeout('#'+ key,originalData[key]);
     break
  } 
  else
  {  
    $('#'+ key).off('focus');
     $('#'+ key).removeClass("errorbox");
     $('#' + key).attr("placeholder", ""); 
  }
}
}
 if (data["file_upload"] !=undefined)
      {
        $('.pdf-error').html(data["file_upload"]);
      }
      else
      {
       $('.pdf-error').html("");
      }
}
})
  }
  else
  {
    alert ('Acepta las condiciones legales');
  }
}