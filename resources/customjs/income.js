$(document).ready(function(){



/* date picker */
$(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      autoclose: true,
    });
});
/* date picker */

/* datatable */
    $('#table_id').DataTable();
/* datatable */
$('.link_addIncome').addClass("active");

})