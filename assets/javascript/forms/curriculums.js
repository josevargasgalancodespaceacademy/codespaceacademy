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
  if( respuesta == "OK")
  {
    alert(respuesta);
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
     break
  } 
  else
  {  
     $('#'+ key).removeClass("errorbox");
     $('#' + key).attr("placeholder", ""); 
  }
}
}
}
})
            
/*var data = JSON.parse(respuesta);
//diferentes validaciones formulario

//campo nombre
 if(data['name'] == 'Este campo es obligatorio')
 {
     $('#nombre-cv').addClass("errorbox");
     $('#nombre-cv').attr("placeholder", data['name']);  
     $('#nombre-cv').val("");
 }
  else 
 {
  $('#nombre-cv').removeClass("errorbox");
  $('#nombre-cv').attr("placeholder", "Nombre completo");  
 }

//campo telefono
 if(data['telephone'] == 'Este campo es obligatorio')
 {
     $('#telefono-cv').addClass("errorbox");
     $('#telefono-cv').attr("placeholder", data['telephone']);  
     $('#telefono-cv').val("");  
 }
  else 
 {
  $('#telefono-cv').removeClass("errorbox");
  $('#telefono-cv').attr("placeholder", "Teléfono");  
 }

//campo email
 if(data['email'] == 'Correo Electronico Invalido')
 {
     $('#email-cv').addClass("errorbox"); 
     $('#email-cv').attr("placeholder", data['email']);  
     $('#email-cv').val("");
 }
  else 
 {
  $('#email-cv').removeClass("errorbox");
  $('#telefono-cv').attr("placeholder", "Email");
 }
  })
    */
  }
  else
  {
    alert ('Acepta las condiciones legales');
  }
}