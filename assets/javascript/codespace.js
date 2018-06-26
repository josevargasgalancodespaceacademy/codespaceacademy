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

/*$(document).ready(function(){
  $(window).scroll(function(){
    if( $(this).scrollTop() > 250 )
    {
      $('.main-nav').addClass('menu-fixed');
      $('.main-nav').slideDown("slow");
    } 
    else {
      $('.main-nav').removeClass('menu-fixed');
    }
  });

});*/
/*No permite usar el boton derecho en la web*/
document.oncontextmenu = function () { return false; }
$(document).ready(function () {
  $('html,body').css("overflow-x", "hidden");

  // Calculate height for profile pictures
  var height = 0;

  $('.blurb-box').children().each(function (i, el) {
    height = $(el).height() > height ? $(el).height() : height;
  });

  $('.blurb-box').height(height + 10);


});

//recargar la página
function recargar() {
  location.reload();
}

/*Se muestra formulario del sorteo*/
$(document).ready(function(){ 
  $('.abrir-formulario-sorteo-videogames').click(function() {
    $('.formulario-sorteo-videogames').toggle('slow');
  });
  $('.abrir-formulario-sorteo-web').click(function() {
    $('.formulario-sorteo-web').toggle('slow');
  });
});
/*Se muestra formulario de envio de cv*/
$(document).ready(function(){
  $('.cv-y-ofertas-button').click(function () {
    $('.formulario-cv').toggle('slow');
  });
});
/*Se muestran preguntas frecuentes al pulsar el boton*/
$(document).ready(function () {
  $('.faq-button').on('click', function (e) {
    $(this).parent().next().toggle('slow');
    e.preventDefault();
  });
});

/*contador hacia atras del primer bootcamp*/
function contador() {
  var launchdate = new Date(2018, 9 - 1, 17);//la fecha de lanzamiento del bootcamp
  var format = 'DD hh:mm:ss';
  $('#counter').countdown({

    format: format,
    layout: '<span class="countdown_row countdown_show4"><span class="countdown_section">' +
      '<span class="countdown_amount">{dnn}</span><br>Dias</span><span class="countdown_section">' +
      '<span class="countdown_amount">{hnn}</span><br>Horas</span><span class="countdown_section">' +
      '<span class="countdown_amount">{mnn}</span><br>Minutos</span><span class="countdown_section">' +
      '<span class="countdown_amount">{snn}</span><br>Segundos</span></span></div></div>',
    until: launchdate
  });
}

/*contador hacia atras del bootcamp en inglés*/
function contador_ingles() {
  var launchdate = new Date(2018, 6 - 1, 18);//la fecha de lanzamiento del bootcamp
  var format = 'DD hh:mm:ss';
  $('#counter').countdown({

    format: format,
    layout: '<span class="countdown_row countdown_show4"><span class="countdown_section">' +
      '<span class="countdown_amount">{dnn}</span><br>Days</span><span class="countdown_section">' +
      '<span class="countdown_amount">{hnn}</span><br>Hours</span><span class="countdown_section">' +
      '<span class="countdown_amount">{mnn}</span><br>Minutes</span><span class="countdown_section">' +
      '<span class="countdown_amount">{snn}</span><br>Seconds</span></span></div></div>',
    until: launchdate
  });
}

function contador_becas() {
  var launchdate = new Date(2017, 12 - 1, 20);//la fecha de finalizacion del sorteo
  var format = 'DD hh:mm:ss';
  $('#counter').countdown({

    format: format,
    layout: '<span class="countdown_row countdown_show4"><span class="countdown_section">' +
      '<span class="countdown_amount">{dnn}</span><br>Dias</span><span class="countdown_section">' +
      '<span class="countdown_amount">{hnn}</span><br>Horas</span><span class="countdown_section">' +
      '<span class="countdown_amount">{mnn}</span><br>Minutos</span><span class="countdown_section">' +
      '<span class="countdown_amount">{snn}</span><br>Segundos</span></span></div></div>',
    until: launchdate
  });
}


/*animacion anclas usabilidad*/
if(window.location.href.indexOf('index')>-1){
  $(function () {

    $('a[href*="#"]:not([href="#"])').click(function () {
  
      if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
        && location.hostname == this.hostname) {
  
        var $target = $(this.hash);
  
        $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
  
        if ($target.length) {
  
          var targetOffset = $target.offset().top;
  
          $('html,body').animate({ scrollTop: targetOffset }, 1000);
  
          return false;
  
        }
  
      }
  
    });
  
  
  });
}
else{
  console.log(window.location.href.indexOf('index'));
}
/*Despliegue de menú móvil*/
$(document).ready(function () {
  $('.hamburger-icon').click(function (e) {
    if ($('body').hasClass("page-bootcamp-web") || $('body').hasClass("page-bootcamp-videogames") || $('body').hasClass("page-qa-360") ) {
      $(".container .menu").animate({
        width: "toggle"
      }, 400);
      if ($('.page-bootcamp-web .hero-block').css("margin-top") == "465px" || $('.page-bootcamp-videogames .hero-block').css("margin-top") == "465px" || $('.page-qa-360 .hero-block').css("margin-top") == "465px")  {
        $('.hero-block').css("margin-top", "80px");
      }
      else {
        $('.hero-block').css("margin-top", "465px");
      }
    }
    else {
      $(".container .menu").animate({
        width: "toggle"
      }, 400);
    }
  });
})
//Transiciones business code courses
function slider() {
  $('.slider-business-courses').unslider({
    speed: 1000,
    delay: 10000,
    keys: true,
    dots: true,
    fluid: true,
    nav: true
  });
};

//datepicker en español
//datepicker fecha de nacimiento becas
function datepicker() {
  $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
  };
  $.datepicker.setDefaults($.datepicker.regional['es']);
  $('#videogames_date_of_birth').datepicker({
    changeYear: true,
    changeMonth: true,
    yearRange: '-100:+0',
    dateFormat: 'dd-mm-yy'
  });
  $('#web_date_of_birth').datepicker({
    changeYear: true,
    changeMonth: true,
    yearRange: '-100:+0',
    dateFormat: 'dd-mm-yy'
  });
};


/*Cookies*/
function getCookie(c_name) {
  var c_value = document.cookie;
  var c_start = c_value.indexOf(" " + c_name + "=");
  if (c_start == -1) {
    c_start = c_value.indexOf(c_name + "=");
  }
  if (c_start == -1) {
    c_value = null;
  } else {
    c_start = c_value.indexOf("=", c_start) + 1;
    var c_end = c_value.indexOf(";", c_start);
    if (c_end == -1) {
      c_end = c_value.length;
    }
    c_value = unescape(c_value.substring(c_start, c_end));
  }
  return c_value;
}

function setCookie(c_name, value, exdays) {
  var exdate = new Date();
  exdate.setDate(exdate.getDate() + exdays);
  var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
  document.cookie = c_name + "=" + c_value + "; path=/";
}

if (getCookie('Aviso de cookies codespaceacademy') != "1") {
  $("#barraaceptacion").css('display', 'block');
}
function PonerCookie() {
  setCookie('Aviso de cookies codespaceacademy', '1', 365);
  document.getElementById("barraaceptacion").style.display = "none";
}

/**
 * Sets a focus event for inputs with errors. On focus the error message
 * is removed and the original value placed in the input box.
 * @param {string} elementId - #id of the input
 * @param {string} originalData - original data passed to php
 * @return void
 */

function replaceValueTimeout(elementId, originalData) {
  $(elementId).on('focus', function () {
    $(elementId).removeAttr('placeholder');
    $(elementId).val(originalData);
  });
}

