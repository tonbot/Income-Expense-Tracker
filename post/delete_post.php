<?php 
try
 {
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $income_id = $_POST['incomeid'];
            $user_id = $_POST['user_id'];
              if (isset( $income_id) && isset($user_id))
                {    
                    #making database connection
                    include_once "dbconnection.php";
                    $connection=new dbconn;
                    #if connection not null
                    if ($connection != null)
                        {      
                              $result=$connection->remove($income_id,$user_id);
                              switch ($result)
                                {
                                    case 'success':
                                        echo 'success';
                                        break;
                                    default:
                                        echo 'failed';
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

?>