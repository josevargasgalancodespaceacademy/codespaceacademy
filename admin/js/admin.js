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
  columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ]
    } );
} );