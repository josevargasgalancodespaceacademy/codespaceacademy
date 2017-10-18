window.onload = function() {

  $('#information-city').on('change',function(evt){
    var city = evt.target.value;

    if(!city) {
      $('#mas_informacion_course_block, .mas_informacion_course_block').css('display','none');
      return;
    }

    $('.mas_informacion_course_block').css('display','none');
    $('#mas_informacion_course_block, .mas_informacion_course_block[data-city='+city+']').css('display','block');

  });

}

function enviar_pedir_mas_informacion(){

    var url ="../assets/php/forms/pedir_informacion.php";
    if ($('#check-mas-info').is(':checked')){ 
    $.ajax({                        
      type: "POST",                 
      url: url,  
      data: $("#pedir_mas_informacion").serialize()                   
    }).done(function(respuesta){
      var originalData = $("#pedir_mas_informacion").serializeArray().reduce(function(obj, item) {
              obj[item.name] = item.value;
              return obj;
           }, {});
      if(respuesta == "OK")
       {
             console.log("HOLA")
             $('#modal-pedir-informacion').modal('show');
             $('.form-control').removeClass("errorbox").val("");
             $('.mas_informacion_course_block').css('display','none');
      }
      else
      {
      var response = JSON.parse(respuesta);
      if (response.hasOwnProperty('name'))
      {
        $('#informacion_name').addClass("errorbox");
        $('#informacion_name').val("");
        $('#informacion_name').attr("placeholder", response['name']);
        replaceValueTimeout('#informacion_name',originalData['name']);
      }
      if (response.hasOwnProperty('email'))
      {
        $('#informacion_email').addClass("errorbox");
        $('#informacion_email').val("");
        $('#informacion_email').attr("placeholder", response['email']);
        replaceValueTimeout('#informacion_email',originalData['email']);
      }
      if (response.hasOwnProperty('telephone'))
      {
        $('#informacion_telephone').addClass("errorbox");
        $('#informacion_telephone').val("");
        $('#informacion_telephone').attr("placeholder", response['telephone']);
        replaceValueTimeout('#informacion_telephone',originalData['telephone']);
      }
      if (response.hasOwnProperty('city'))
      {
        $('.city-error').css('display','block').html(response["city"]);
        $('#information-city').on('focus',function(){
          $('.city-error').css('display','none');
        });
      }
      if (response.hasOwnProperty('course-' + originalData["city"]))
      {
        $('.course-error').css('display','block').html(response['course-' + originalData["city"]]);
        $('.mas_informacion_course_block').on('focus',function(){
          $('.course-error').css('display','none');
        });
      }
      }
    });
  }else{
    alert ('Acepta las condiciones legales');
  }
}

