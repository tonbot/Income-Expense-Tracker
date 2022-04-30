
<!-- including bootstrap resources -->
<?php 
    include_once('resources/include.php'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BUDJECT</title>
    <link rel="stylesheet" href="resources/customCss/budject.css">
    <script src="/resources/customJs/budject.js"></script>
</head>
<body>
    <div class="motherContainer">
            <div class="row">
  <!------------------------------------------------->      <!------------------------------------------------->           
                   <!-- including sidenav -->
                   <?php require "resources/sidenav/sidenav.php" ?>
                   <!--sidenav  ends here -->
  <!------------------------------------------------->       <!------------------------------------------------->             
                <div class="col-lg-10 bg-light px-0">                                
                    <!-- including topnav -->
                    <?php require 'resources/topnav/topnav.php' ?>
                     <!-- topnav ends here -->
   <!-------------------------------------------------> 
                
                </div>
            </div>
           
    </div>
</body>
</html>



 <!-------------------------------------------------> 
 <div id="myBudject" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="text-right mr-3 mt-3 ">
                 <button class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-window-close text-danger" aria-hidden="true"></i></span>
                 </button> 
             </div> 
             <div class="modal-body">
                 <div class="text-center"><h3>Set Monthly Budject</h3></div>
                 <div>
                 <form action="" method="post">
                       <div class="form-group">
                           <label for="my-select"><small>Select Category<span class="text-danger"> *</span></small></label>
                           <select id="my-select" class="form-control" name="">
                               <option></option>
                               <option>yprp</option>
                               <option>fdf</option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                               <option></option>
                           </select>
                       </div>
                        <div>
                             <label for="my-select"><small>Budject Amount<span class="text-danger"> *</span></small></label>
                             <input class="form-control" type="number" name="">
                        </div>
                          <hr style="border-color:#3F4453;">
                           <div class="text-center mb-2"><small>Select year and month for your Budget</small></div>
                         <div class="dateYerContainer">
                              <ul>
                                    <li >
                                             
                                            <select id="my-select" class="form-control" name="">
                                            <option>2021</option>
                                            <option>2020</option>
                                            <option>2019</option>
                                            </select>
                                    </li>
                                    <li>     
                                            
                                            <select id="my-select" class="form-control" name="">
                                            <option>JANUARY</option>
                                            <option>FEBRUARY</option>
                                            <option>MARCH</option>
                                            <option>APRIL</option>
                                            <option>MAY</option>
                                            <option>JUNE</option>
                                            <option>JULY</option>
                                            <option>AUGUST</option>
                                            <option>SEPTEMBER</option>
                                            <option>OCTOBER</option>
                                            <option>NOVEMBER</option>
                                            <option>DECEMBER</option>
                                            </select>
                                    </li>
                                </ul>
                         </div>
                        <div class="text-center mt-3" >
                            <button class="btn btn-info px-5">Add</button>
                        </div>
                         

                 </form>
                 </div>
             </div>
            
         </div>
     </div>
 </div>
 <!-------------------------------------------------->
