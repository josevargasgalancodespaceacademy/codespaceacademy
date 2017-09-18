/*Menu fijo al hacer scroll*/
/*$(document).ready(function(){
  var altura = $('.hero-block').offset().top;
  
  $(window).on('scroll', function(){
    if ( $(window).scrollTop() > altura ){
      $('.main-nav').addClass('menu-fixed');
    } else {
      $('.main-nav').removeClass('menu-fixed');
    }
  });

});*/

$(document).ready(function(){ 
   $('html,body').css("overflow-x","hidden");
  });

//recargar la página
function recargar()
{
 location.reload();
}

/*Se muestra formulario del sorteo*/
$(document).ready(function(){ 
  $('.abrir-formulario-sorteo').click(function() {
    $('.formulario-sorteo').toggle('slow');
  });
});
/*Se muestra formulario de envio de cv*/
$(document).ready(function(){ 
  $('.cv-y-ofertas-button').click(function() {
    $('.formulario-cv').toggle('slow');
  });
});
/*Se muestran preguntas frecuentes al pulsar el boton*/
$(document).ready(function(){ 
        $('.faq-button').on('click',function(e){
            $(this).parent().next().toggle('slow');
            e.preventDefault();
        });
        });

/*contador hacia atras del primer bootcamp*/
function contador() { 
    var launchdate = new Date(2017, 11 - 1, 20);//la fecha de lanzamiento del bootcamp
    $('#counter').countdown({
        until: launchdate
    });
  }
/*Se oculta ventana de sorteo*/
/*$(function() {
$('.boton-sorteo').click(function(){
     $('.formulario-sorteo').css('display','none');
   });
});*/
/*Se oculta ventana de envio de cv*/
/*$(function() {
$('.boton-enviar-cv').click(function(){
     $('.formulario-cv').css('display','none');
   });
})*/


/*animacion anclas usabilidad*/
$(function(){

     $('a[href*="#"]:not([href="#"])').click(function() {

     if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
         && location.hostname == this.hostname) {

             var $target = $(this.hash);

             $target = $target.length && $target || $('[name=' + this.hash.slice(1) +']');

             if ($target.length) {

                 var targetOffset = $target.offset().top;

                 $('html,body').animate({scrollTop: targetOffset}, 1000);

                 return false;

            }

       }

   });


});

/*Despliegue de menú móvil*/
$(document).ready(function(){ 
  $('.hamburger-icon').click(function(e) {
   if ($('body').hasClass("page-home"))
   {
    $(".container .menu").animate({
            width: "toggle"   
        },500);
    if($('.page-home .hero-block').css("margin-top")=="450px")
    {
       $('.page-home .hero-block').css("margin-top", "0px");
    }
    else
    {
    $('.page-home .hero-block').css("margin-top", "450px");
  }
   }
  else if ($('body').hasClass("page-bootcamp-web"))
   {
    $(".container .menu").animate({
            width: "toggle"   
        },500);
    if ($('.page-bootcamp-web .hero-block').css("margin-top")=="465px")
    {
       $('.page-bootcamp-web .hero-block').css("margin-top", "80px");
    }
    else
    {
    $('.page-bootcamp-web .hero-block').css("margin-top", "465px");
  }
  } 
else{
    $(".container .menu").animate({
            width: "toggle"       
        },500);
  }
  });
})

//datepicker en español
//datepicker fecha de nacimiento becas
function datepicker() {
 $.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
 $.datepicker.setDefaults($.datepicker.regional['es']);
    $('#date_of_birth').datepicker({
      changeYear: true,
      changeMonth: true ,
      yearRange: '-100:+0',
      dateFormat:'dd-mm-yy'});
  };

   /*Cookies*/
function getCookie(c_name){
  var c_value = document.cookie;
  var c_start = c_value.indexOf(" " + c_name + "=");
  if (c_start == -1){
    c_start = c_value.indexOf(c_name + "=");
  }
  if (c_start == -1){
    c_value = null;
  }else{
    c_start = c_value.indexOf("=", c_start) + 1;
    var c_end = c_value.indexOf(";", c_start);
    if (c_end == -1){
      c_end = c_value.length;
    }
    c_value = unescape(c_value.substring(c_start,c_end));
  }
  return c_value;
}

function setCookie(c_name,value,exdays){
  var exdate=new Date();
  exdate.setDate(exdate.getDate() + exdays);
  var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
  document.cookie=c_name + "=" + c_value;
}

if(getCookie('codespaceaviso')!="1"){
  $("#barraaceptacion").css('display', 'block');
}
function PonerCookie(){
  setCookie('codespaceaviso','1',365);
  document.getElementById("barraaceptacion").style.display = "none";
}

/**
 * Sets a focus event for inputs with errors. On focus the error message
 * is removed and the original value placed in the input box.
 * @param {string} elementId - #id of the input
 * @param {string} originalData - original data passed to php
 * @return void
 */
 
function replaceValueTimeout(elementId,originalData) {
    $(elementId).on('focus',function(){
      $(elementId).removeAttr('placeholder');
      $(elementId).val(originalData); 
    });
}

