$(document).ready(function() {
  let table = $('#example').DataTable( {
    dom: 'Blfrtip',
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
    language: {
      "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Ukrainian.json"
  }
  });

  table.buttons().container().appendTo( '#example_wrapper .col-md-6:eq(0)' );
});