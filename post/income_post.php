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
                                $incomeType = $_POST['category'];
                                if ($connection != null) { 
                                    $result=$connection->add_income_category($incomeType, $user_id);
                                    echo json_encode($result);
                                }
                        break;

                        case "si" :
                            /** save income */
                            $incomeType = $_POST['category'];
                            $incomeAmount = $_POST['amount'];
                            $incomeDate = $_POST['transaction_date'];
                            $description = $_POST['description'];
                                if (isset($incomeType) && isset( $incomeAmount) && isset($incomeDate) && isset($user_id)) {   
                                    if ($connection != null) {     
                                            $result=$connection->add_income($incomeType, $incomeAmount, $incomeDate, $description, $user_id);
                                            echo json_encode($result);
                                        }
                                }
                        break;

                        case "sec": 
                            /** select category */
                            if ($connection != null) { 
                                $result= $connection -> get_income_category($user_id);
                                echo json_encode($result);
                            }
                        break;

                        case "de": 
                            /** select category */
                            if ($connection != null) { 
                                $income_id = $_POST['income_id'];
                                $result= $connection -> delete_income($user_id,$income_id);
                                echo json_encode($result);
                            }
                        break;

                        case "up" :
                            /** save income */
                            $incomeType = $_POST['category'];
                            $incomeAmount = $_POST['amount'];
                            $incomeDate = $_POST['transaction_date'];
                            $description = $_POST['description'];
                            $income_id = $_POST['income_id'];

                                if (isset($incomeType) && isset( $incomeAmount) && isset($incomeDate) && isset($user_id) && isset($income_id) ) {   
                                    if ($connection != null) {     
                                            $result=$connection->update_income($incomeType, $incomeAmount, $incomeDate, $description, $user_id, $income_id);
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
                $result= $connection -> get_income($user_id);
                echo json_encode($result);
            }

        }
    
}
   catch(ERRMODE_EXCEPTION $e)
    {

        echo $e;

    }
            
?>