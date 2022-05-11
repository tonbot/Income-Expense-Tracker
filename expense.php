
<!-- including bootstrap resources -->
<?php
    session_start();
    require_once ('resources/include.php');   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUDJECT</title>
    <link rel="stylesheet" href="resources/customCss/income.css">
    <script src="resources/customJs/expense.js"></script> 
 
</head>
<body>

    <div class="motherContainer">
            <div class="row">
  <!------------------------------------------------->      <!------------------------------------------------->           
                   <!-- including sidenav -->
                <?php require_once('resources/sidenav/sidenav.php')?>
                   <!--sidenav  ends here -->
  <!------------------------------------------------->       <!------------------------------------------------->             
                <div class="col-lg-10 bg-light px-0">                                
                    <!-- including topnav -->
                    <?php require_once('resources/topnav/topnav.php')?>
                     <!-- topnav ends here -->
                     <!-- title -->
                     <h5 class="pl-3 my-3 title">Expense</h5>
                     <!-- title -->
                     <div class= "px-3 pr-4"> <!-- padding container -->
                     <div class="sectionContainer bg-white  py-3 px-5 shadow-sm">
                          <!------------------------------------------------->       <!------------------------------------------------->  
                         <div class="row"><!-- begin of row -->
                             <div class="col-sm-6">
                                 <div class="form-group " style= "width:40%">
                                     <select id="income_year" class="form-control" name="">
                                         <option>Text</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-sm-6 text-right">
                             <div class="input-group ">
                                <input type="text" class="form-control newCategory" placeholder="Enter expense category">
                                <div class="input-group-append pr-2">
                                    <button class="btn btn-primary save" type="submit">Save</button>
                                </div>
                                <button class="btn btn-primary shadow-sm addnew" type="button" data-toggle="modal" data-target="#newIcome"><i class="fas fa-plus fa-1x mr-2"></i> Add Expense</button>
                             </div>
                             
                             </div>
                         </div><!-- end of row -->

                         <!-- datatable -->
                         <div class="tableContainer py-5">
                         <table id="table_id" class="table table-bordered table-hover table-sm ">
                            <thead  >
                                <tr class="thead">
                                    <th scope = "row" width="2%">#</th>
                                    <th>Expense Category</th>
                                    <th>Expense Amount</th>
                                    <th>Expense date</th>
                                    <th>Expense Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <!-- <tbody id="tbody">
                                
                            </tbody> -->
                        </table>
                        </div>
                         <!-- end of datatable -->
                         <span id="e" hidden></span>
                         <!------------------------------------------------->       <!------------------------------------------------->  
                     </div>
                     </div>
                </div>
   <!-------------------------------------------------> 
            
            </div>
    </div> 

    <!-- set user identity-->
    <script>
        var user = "<?php echo ($_SESSION["user"])?>" 
        var e = "<?php echo ($_SESSION["id"])?>" 
        document.getElementById("users").innerHTML  = user;
        document.getElementById("e").innerHTML  = e;
     </script>
    <!-- user -->

</body>
</html>

 <!-------------------------------------------------> 
 <!-- The Modal -->
<div class="modal fade " id="newIcome">
  <div class="modal-dialog  modal-dialog-centered  ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Expense<h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p class="text-center note">(You can add/delete/edit expense later as you wish) </p>
        <div class="frmContainer">
            <form action="" method="post">
                <div class="form-group">
                    <label for="my-select">Category: *</label>
                    <select class="form-control" name="" id="category" required>
                        
                    </select>
                </div>
                <div>
                    <label for="decription-other">Enter Description: *</label>
                    <input class="form-control" type="text" name="" id="description" autocomplete="off" required>
                    <small class="form-text text-muted mb-2">Please provide a description of this income if any:</small>
                </div>
                <div class="mb-2">
                    <label for="Amount mt-2">Amount: *</label>
                    <input class="form-control" type="number" name="" id="amount"  autocomplete="off" required>
                </div>
                <div>
                    <label for="transaction_date mt-2">Transaction Date: *</label>
                    <input class="form-control datepicker" name="" id="transaction_date" autocomplete="off" required>
                    
                </div>
                <small class="form-text text-center" id="feedback">Please fill all the form</small>

            </form>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btnAdd" >Add</button>
        <button type="button" class="btn btnEdit" >Edit</button>
      </div>

    </div>
  </div>
</div>
 <!-------------------------------------------------->
 