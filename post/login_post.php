<?php 
try
 {
    if ($_SERVER['REQUEST_METHOD']=="POST")
        {          
             $email = $_POST['email'];
             $password = $_POST['password'];
              if (isset($email) && $email !== "" && $password !== "" && isset($password) )
                {    
                    $session = null;
                    #making database connection
                    include_once "../controller/dbconnection.php";
                    $connection = new dbconn;
                    #if connection not null
                    if ($connection != null)
                        {      
                            
                              $result=$connection->login($email,$password);
                              $connection = null;
                              if( $result -> data != 0 ){
                                session_start();
                                $_SESSION["user"] = $result -> data[0]["firstName"];
                                $_SESSION["id"] = $result -> data[0]["id"];
                                echo (json_encode("true"));
                              }else{
                                  echo json_encode("false");
                              }
                        }
                    else{
                        #if connection is null
                        echo($connection);
                    }
                }
        }
    
}
   catch(ERRMODE_EXCEPTION $e)
    {
        echo $e;
    }

?>