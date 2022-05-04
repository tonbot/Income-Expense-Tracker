$(document).ready(function(){

/* date picker */
$(function(){
    $('.datepicker').datepicker({
      format: 'yyyy-mm-dd',
      todayHighlight: true,
      autoclose: true,
    });
});

/* datatable */
    $('#table_id').DataTable();

/*add class to nav bar */
$('.link_addIncome').addClass("active");

//On cliked of button add
$('.btnAdd').click(function (){
  /*getting the form data*/
let userId = validate($('#userId').html());
let category = validate($('#category').val());
let description = $('#description').val();
let amount = validate($('#amount').val()); 
let transaction_date = validate($('#transaction_date').val());
/**validatiog the form data */
if ( userId == "empty" || category == "empty" || amount == "empty" || transaction_date == "empty"){
      //send response 
      $('#feedback').html("Please fill the important field")
    }
else{
      //validate amount
      if(isNaN(amount)){
        $('#feedback').html("Please enter a valid number")
        return;
      }
      let fd=new FormData();
      fd.append("userId", userId);
      fd.append("category", category);
      fd.append("description", description);
      fd.append("amount", amount);
      fd.append("transaction_date", transaction_date);

      save_income(fd);
      
    }

})//end of button add

/** function to save income */
function save_income(fd){
  $.ajax({
    url: "post/income_post.php",
    type: "POST",
    data: fd,   //sending formdata to save income
    encode:true,
    success: function(data)
        {
           switch (data.trim()) {
               case 'success':
                        swal({
                            icon: "success",
                            title: "SUCCESS",
                            text: "NEW BILL GENERATED SUCCESSFULLY"
                        });
                   break;
               case 'true':
                        swal({
                            icon: "error",
                            title: "Ooops! FAILED",
                            text: "BILL FOR THIS YEAR HAS ALREADY BEEN GENERATED"
                        });
                   break;
           
               default:
                   //   alert("An error occur Bill cannot be Generated");
                   window.location.reload() ; 
                   console.log(data);
                   break;
           }
            
        },
    error: function(error)
        {
            swal({
                icon: "error",
                title: "ERROR",
                text: "AN ERROR"
            });  
        }   


  });
}






////validate function
function validate(data){
  if (data==null || data==""){
      return "empty"; 
  }
  else {
      let data1 = data;
          data1 = data1.trim();
          return data1;
  }
}

})//end of main document
