<?php 
try
 {
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {          
             $email = $_POST['email'];
             $password = $_POST['password'];
              if (isset($email) && isset($password) )
                {    
                    #making database connection
                    include_once "dbconnection.php";
                    $connection=new dbconn;
                    #if connection not null
                    if ($connection != null)
                        {      
                              $result=$connection->login($email,$password);
                              switch ($result)
                                {
                                    case 'user not found':
                                        echo 'user not found';
                                        break;
                                    default:
                                        echo $result;
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