<?php 
try
 {
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $incomeType = $_POST['incomeType'];
            $incomeAmount = $_POST['incomeAmount'];
            $incomeDate = $_POST['incomeDate'];
            $description = $_POST['description'];
            $user_id = $_POST['user_id'];
              if (isset( $incomeType) && isset( $incomeAmount) && isset($incomeDate) && isset($user_id))
                {    
                    #making database connection
                    include_once "dbconnection.php";
                    $connection=new dbconn;
                    #if connection not null
                    if ($connection != null)
                        {      
                              $result=$connection->addIncome($incomeType,$incomeAmount,$incomeDate,$description,$user_id);
                              switch ($result)
                                {
                                    case 'success':
                                        echo 'success';
                                        break;
                                    case 'failed':
                                        echo 'failed';
                                        break;
                                    case 'Income type already exist for this date':
                                        echo 'Income type already exist for this date';
                                        break;  

                                    
                                    
                                }
                        }
                }
        }
    
}
   catch(ERRMODE_EXCEPTION $e)
    {

        echo $e;

    }
             //echo ($firstName. $lastName. $email. $phoneNumber.$password);

?>