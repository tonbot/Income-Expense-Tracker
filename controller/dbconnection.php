<?php

 class dbconn 
 {
   
   public  $pdo=null;

    function __construct()
    { //making connection to the database
        try
            {
            
                $host="localhost";
                $dbname="budjecttracking";
                $password="";
                $user="root";
                $this->pdo=new PDO("mysql:host=$host; dbname=$dbname", $user, $password );
                $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            } 
        catch(PDOException $e)
            {
                echo ($e->getMessage());
            }
    }

/** login */
function login($email, $password) 
{    
    $query  = "SELECT * FROM user WHERE email = :email AND password = :password" ;
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'email'    => $email,
            'password' => $password,
        ]);
    return   $this->validateResponse($result);
    
} //Login user ends here









/** validate database response */
public function validateResponse($result){
    $response = new stdClass();
    if ($result -> rowCount() > 0)
        {
            $result -> setFetchMode(PDO::FETCH_ASSOC);
            $result = $result -> fetchall();
            $response -> data = $result;
            return $response;
        }
    else
        {
            $response -> data = 0;
            return $response;
        }

}



 }
 ?>