$(document).ready(function() {
    $('#tabla-datos').DataTable( {
     "pagingType": "full_numbers",
       "language": {
    "lengthMenu": 'Muestra <select>'+
      '<option value="5">5</option>'+
      '<option value="10">10</option>'+
      '<option value="15">15</option>'+
      '</select> filas'
  }
    } );
} );