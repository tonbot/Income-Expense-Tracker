<?php 
try
 {
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $password = $_POST['password'];
              if (isset( $firstName) && isset( $lastName) && isset($email) && isset($phoneNumber) && isset($password) )
                {    
                    #making database connection
                    include_once "dbconnection.php";
                    $connection=new dbconn;
                    #if connection not null
                    if ($connection != null)
                        {      
                              $result=$connection->register($firstName,$lastName,$email,$phoneNumber,$password);
                              switch ($result)
                                {
                                    case 'success':
                                        echo 'success';
                                        break;
                                    case 'failed':
                                        echo 'failed';
                                        break;
                                    case 'exist':
                                        echo 'exist';
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