<?php 
try
 {
    session_start();
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {
           /*getting form data*/
            $user_id = $_SESSION['id'];
            $check = $_POST['e'];

              if(isset($check))
              {

                    #making database connection
                    include_once "../controller/dbconnection.php";
                    $connection=new dbconn;
                    #if connection not null

                  switch($check)
                  {
                        case "sc": 
                            /** save category */
                                $expenseType = $_POST['category'];
                                if ($connection != null) { 
                                    $result=$connection->add_expense_category($expenseType, $user_id);
                                    echo json_encode($result);
                                }
                        break;

                        case "si" :
                            /** save expense */
                            $expenseType = $_POST['category'];
                            $expenseAmount = $_POST['amount'];
                            $expenseDate = $_POST['transaction_date'];
                            $description = $_POST['description'];
                                if (isset($expenseType) && isset( $expenseAmount) && isset($expenseDate) && isset($user_id)) {   
                                    if ($connection != null) {     
                                            $result=$connection->add_expense($expenseType, $expenseAmount, $expenseDate, $description, $user_id);
                                            echo json_encode($result);
                                        }
                                }
                        break;

                        case "sec": 
                            /** select category */
                            if ($connection != null) { 
                                $result= $connection -> get_expense_category($user_id);
                                echo json_encode($result);
                            }
                        break;

                        case "de": 
                            /** select category */
                            if ($connection != null) { 
                                $expense_id = $_POST['expense_id'];
                                $result= $connection -> delete_expense($user_id,$expense_id);
                                echo json_encode($result);
                            }
                        break;

                        case "up" :
                            /** save income */
                            $expenseType = $_POST['category'];
                            $expenseAmount = $_POST['amount'];
                            $expenseDate = $_POST['transaction_date'];
                            $description = $_POST['description'];
                            $expense_id = $_POST['expense_id'];

                                if (isset($expenseType) && isset( $expenseAmount) && isset($expenseDate) && isset($user_id) && isset($expense_id) ) {   
                                    if ($connection != null) {     
                                            $result=$connection->update_income($expenseType, $expenseAmount, $expenseDate, $description, $user_id, $expense_id);
                                            echo json_encode($result);
                                        }
                                }

                  }
              }
            
             
        }else{
                #making database connection
                include_once "../controller/dbconnection.php";
                $connection=new dbconn;
                #if connection not null
             $user_id = $_GET['userId'];
            if ($connection != null) { 
                $result= $connection -> get_expense($user_id);
                echo json_encode($result);
            }

        }
    
}
   catch(ERRMODE_EXCEPTION $e)
    {

        echo $e;

    }
            
?>