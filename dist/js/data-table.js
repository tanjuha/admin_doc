$(document).ready(function() {
  let table = $('#example').DataTable( {
    // dom: 'Blfrtip',
    // "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    lengthChange: false,
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
  });

  table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
});