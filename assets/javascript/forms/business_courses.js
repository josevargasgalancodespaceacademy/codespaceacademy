function enviar_business_course_form(){
  var url = "../../assets/php/forms/business_courses.php";
  if ($('#check-business-course').is(':checked')){ 
  $.ajax({                        
    type: "POST",                 
    url: url,  
    data: $("#formulario-business-courses").serialize()                   
  }).done(function(respuesta){
    var postData = $("#formulario-business-courses").serializeArray().reduce(function(obj, item) {
    obj[item.name] = item.name;
    return obj;
    }, {});
    var originalData = $("#formulario-business-courses").serializeArray().reduce(function(obj, item) {
      obj[item.name] = item.value;
      return obj;
    }, {});
    console.log(respuesta);
    if( respuesta == "\nOK") {
      $('#modal-business-courses').modal('show');
    } else {
      var data = JSON.parse(respuesta);
      $('#formulario-business-courses .mensajerror').css('display', 'inline-block');
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
























/*var data = JSON.parse(respuesta);
//diferentes validaciones formulario

//campo nombre
 if(data['name'] == 'Este campo es obligatorio')
 {
     $('#nombre-talento').addClass("errorbox");
     $('#nombre-talento').attr("placeholder", data['name']);  
     $('#nombre-talento').val("");
 }
  else 
 {
  $('#nombre-talento').removeClass("errorbox");
  $('#nombre-talento').attr("placeholder", "Nombre completo");  
 }

//campo telefono
 if(data['telephone'] == 'Length not in correct range')
 {
     $('#telefono-talento').addClass("errorbox");
     $('#telefono-talento').attr("placeholder", data['telephone']);  
     $('#telefono-talento').val("");  
 }
  else 
 {
  $('#telefono-talento').removeClass("errorbox");
  $('#telefono-talento').attr("placeholder", "Teléfono");  
 }

//campo email
 if(data['email'] == 'Correo Electronico Invalido')
 {
     $('#email-talento').addClass("errorbox"); 
     $('#email-talento').attr("placeholder", data['email']);  
     $('#email-talento').val("");
 }
  else 
 {
  $('#email-talento').removeClass("errorbox");
  $('#telefono-talento').attr("placeholder", "Email");
 }

//nombre empresa
 if(data['company_name'] == 'Este campo es obligatorio')
 {
     $('#nombre-empresa').addClass("errorbox");
     $('#nombre-empresa').attr("placeholder", data['company_name']);  
     $('#nombre-empresa').val("");    
 }
  else 
 {
  $('#nombre-empresa').removeClass("errorbox");
  $('#nombre-empresa').attr("placeholder", "Nombre de tu empresa");
 }

//informacion a medida
 if(data['training_request'] == 'Este campo es obligatorio')
 {
     $('#formacion-a-medida').addClass("errorbox");   
 }
  else 
 {
  $('#formacion-a-medida').removeClass("errorbox");
 }


//mostrar mensaje de error 
for (var key in data) {

  if (data[key] !=="")
  {
     $('#company_contacts .mensajerror').css('display', 'inline-block');
     break;
  }
}
//ocultar mensaje de error
})
}*/