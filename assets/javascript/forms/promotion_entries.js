function enviar_sorteo_becas(){
        var url ="../assets/php/forms/promotion_entries.php";
if ($('#check-sorteo').is(':checked')){ 
        $.ajax({                        
           type: "POST",                 
           url: url,  
           data: $("#promotion_entries").serialize()                   
}).done(function(respuesta){
	var data = JSON.parse(respuesta);
	 //campo nombre
 if(data['name'] == 'Este campo es obligatorio')
 {
     $('#nombre-sorteo').addClass("errorbox");
     $('#nombre-sorteo').attr("placeholder", data['name']);  
     $('#nombre-sorteo').val("");
 }
  else 
 {
  $('#nombre-sorteo').removeClass("errorbox");
  $('#nombre-sorteo').attr("placeholder", "Introduce tu nombre");  
 }

 //campo apellidos
  if(data['surnames'] == 'Este campo es obligatorio')
 {
     $('#apellidos-sorteo').addClass("errorbox");
     $('#apellidos-sorteo').attr("placeholder", data['surnames']);  
     $('#apellidos-sorteo').val("");
 }
  else 
 {
  $('#apellidos-sorteo').removeClass("errorbox");
  $('#apellidos-sorteo').attr("placeholder", "Introduce tus apellidos");  
 }

 //campo documento de identidad
 //Select tipo de documento
 if(data['type_identification'] == 'Este campo es obligatorio')
 {
     $('#tipo-identidad-sorteo').addClass("errorbox");   
 }
  else 
 {
  $('#tipo-identidad-sorteo').removeClass("errorbox");
 }

 //numero de documento
 if(data['number_identification'] == 'Numero de identificacion no es valido')
 {
     $('#numero-identidad-sorteo').addClass("errorbox");
     $('#numero-identidad-sorteo').attr("placeholder", data['number_identification']);  
     $('#numero-identidad-sorteo').val("");
 }
  else 
 {
  $('#numero-identidad-sorteo').removeClass("errorbox");
  $('#numero-identidad-sorteo').attr("placeholder", "Introduce tu número de identidad");  
 }

//fecha de nacimiento
if(data['date_of_birth'] == 'Fecha es invalido')
 {
     $('#fecha-nac-sorteo').addClass("errorbox");   
 }
  else 
 {
  $('#fecha-nac-sorteo').removeClass("errorbox");
 }

//campo email
 if(data['email'] == 'Correo Electronico Invalido')
 {
     $('#email-sorteo').addClass("errorbox"); 
     $('#email-sorteo').attr("placeholder", data['email']);  
     $('#email-sorteo').val("");
 }
  else 
 {
  $('#email-sorteo').removeClass("errorbox");
  $('#telefono-sorteo').attr("placeholder", "Email");
 }

//campo telefono
 if(data['telephone'] =="Este campo es obligatorio")
 {
     $('#telefono-sorteo').addClass("errorbox");
     $('#telefono-sorteo').attr("placeholder", data['telephone']);  
     $('#telefono-sorteo').val("");  
 }
  else 
 {
  $('#telefono-sorteo').removeClass("errorbox");
  $('#telefono-sorteo').attr("placeholder", "Teléfono");  
 }

//ciudad
 if(data['city'] == 'Este campo es obligatorio')
 {
     $('#ciudad-sorteo').addClass("errorbox");
     $('#ciudad-sorteo').attr("placeholder", data['city']);  
     $('#ciudad-sorteo').val("");    
 }
  else 
 {
  $('#ciudad-sorteo').removeClass("errorbox");
  $('#ciudad-sorteo').attr("placeholder", "Introduce tu ciudad");
 }


//mostrar mensaje de error 
/*for (var key in data) {

  if (data[key] !=="")
  {
     $('#company_contacts .mensajerror').css('display', 'inline-block');
     break;
  }
}*/
})
  }else{
    alert ('Acepta las condiciones legales');
  }
}