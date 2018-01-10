$(document).ready(function() {
    $('#tabla-datos').DataTable( {
     "pagingType": "full_numbers",
       "language": {
    "lengthMenu": 'Muestra <select>'+
      '<option value="10">10</option>'+
      '<option value="15">15</option>'+
      '<option value="20">20</option>'+
      '<option value="-1">All</option>'+
      '</select> filas'
  }
    } );
} );

/*Despliegue de menú móvil*/
$(document).ready(function(){ 
  $('.hamburger-icon').click(function(e) {
 if ($('body').hasClass("page-bootcamp-web"))
   {
    $(".container .menu").animate({
            width: "toggle"   
        },400);
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
        },400);
  }
  });
})
