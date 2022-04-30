
<!-- including bootstrap resources -->
<?php 
              header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
              header("Cache-Control: post-check=0, pre-check=0", false);
              header("Pragma: no-cache");
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
    <script src="resources/customJs/income.js"></script> 
 
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
                     <h5 class="pl-3 my-3 title">Income</h5>
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
                                <input type="text" class="form-control newCategory" placeholder="Enter income category">
                                <div class="input-group-append pr-2">
                                    <button class="btn btn-primary save" type="submit">Save</button>
                                </div>
                                <button class="btn btn-primary shadow-sm " type="button" data-toggle="modal" data-target="#newIcome"><i class="fas fa-plus fa-1x mr-2"></i> Add Income</button>
                             </div>
                             </div>
                         </div><!-- end of row -->

                         <!-- datatable -->
                         <div class="tableContainer py-5">
                         <table id="table_id" class="table table-bordered table-hover">
                            <thead  >
                                <tr class="thead">
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                    <th>Column 1</th>
                                    <th>Column 2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                </tr>
                                <tr>
                                    <td>Row 2 Data 1</td>
                                    <td>Row 2 Data 2</td>
                                    <td>Row 1 Data 1</td>
                                    <td>Row 1 Data 2</td>
                                </tr>
                            </tbody>
                        </table>
                        </div>
                         <!-- end of datatable -->

                         <!------------------------------------------------->       <!------------------------------------------------->  
                     </div>
                     </div>
                </div>
   <!-------------------------------------------------> 
            
            </div>
    </div>
</body>
</html>



 <!-------------------------------------------------> 
 <!-- The Modal -->
<div class="modal fade " id="newIcome">
  <div class="modal-dialog  modal-dialog-centered  ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Income<h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p class="text-center note">(You can add/delete/edit income later as you wish) </p>
        <div class="frmContainer">
            <form action="" method="post">
                <div class="form-group">
                    <label for="my-select">Description</label>
                    <select id="description" class="form-control" name="" required>
                        <option>Salary/Wages</option>
                        <option>other</option>
                    </select>
                </div>
                <div>
                    <label for="decription-other">Enter Description</label>
                    <input class="form-control" type="text" name="" id="description-other" placeholder= "Contribution" required>
                </div>
                <div>
                    <label for="Amount mt-2">Amount</label>
                    <input class="form-control" type="number" name="" id="amount" required>
                </div>
                <div>
                    <label for="transaction_date mt-2">Transaction Date</label>
                    <input class="form-control datepicker" type="text" name="" id="transaction-date" required>
                    
                </div>

            </form>
        </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btnAdd" >Add</button>
        <button type="button" class="btn btnEdit" hidden>Edit</button>
      </div>

    </div>
  </div>
</div>
 <!-------------------------------------------------->
  