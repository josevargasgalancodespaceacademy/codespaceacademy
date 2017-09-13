function enviar_contacto_company(){
        var url ="../assets/php/forms/company_contacts.php";
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#company_contacts").serialize()                   
}).done(function(respuesta){

 var postData = $("#company_contacts").serializeArray().reduce(function(obj, item) {
            obj[item.name] = item.name;
            return obj;
        }, {});
  if( respuesta == "OK")
  {
    $('#modal-talento').modal('show');
  }
  else
  {
  var data = JSON.parse(respuesta);
  $('#company_contacts .mensajerror').css('display', 'inline-block');
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