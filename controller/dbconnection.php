<?php

 class dbconn 
 {
   
   public  $pdo=null;

    function __construct(){
     //making connection to the database
        try
            {
            
                $host="localhost";
                $dbname="income_expensetracker";
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
function login($email, $password) {    
    $query  = "SELECT * FROM user WHERE email = :email AND password = :password" ;
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'email'    => $email,
            'password' => $password,
        ]);
    return   $this->validateResponse($result);
    
}
################################################start of income function###########################################################
/**add income */
function add_income($incomeType,$incomeAmount,$incomeDate,$description,$user_id){  
   $query      = "SELECT * FROM income WHERE user_id = :user_id AND income_type = :incomeType AND income_date = :incomeDate ";
   $result = $this->pdo->prepare($query);
   $result->execute
       ([
           'user_id'    => $user_id,
           'incomeType' => $incomeType,
           'incomeDate'    => $incomeDate
       ]);

       $response = $this->validateResponse($result);

       if($response -> data != 0){
            return $response->data = "exist";           
           } 
       else
           {  
               /** create new entry */
               $query     = "INSERT INTO income(user_id, income_type, income_amount, income_date, income_description) VALUES (:user_id, :incomeType, :incomeAmount, :incomeDate, :description)";
               $statement = $this->pdo->prepare($query);
               $statement->execute
                   ([
                       'user_id'        => $user_id,
                       'incomeType'     => $incomeType,
                       'incomeAmount'   => $incomeAmount,
                       'incomeDate'     => $incomeDate,
                       'description'    => $description,
                   ]);
                       if ($statement)
                           {
                               return $response -> data = "true";
                           }
                       else
                           {
                               return $response -> data = "false";
                           }
           }

}   
/**update income */
function update_income($incomeType,$incomeAmount,$incomeDate,$description,$user_id, $income_id){  
   
                /** create new entry */
                $query     = "UPDATE income SET income_type=:incomeType, income_amount=:incomeAmount, income_date=:incomeDate, income_description=:description WHERE id=:income_id AND user_id=:user_id";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        'user_id'        => $user_id,
                        'incomeType'     => $incomeType,
                        'incomeAmount'   => $incomeAmount,
                        'incomeDate'     => $incomeDate,
                        'description'    => $description,
                        'income_id'      => $income_id
                    ]);
                        if ($statement)
                            {
                                return $response -> data = "true";
                            }
                        else
                            {
                                return $response -> data = "false";
                            }
          
 }  
/** add category */
function add_income_category($incomeType,$user_id){  


    $query      = "SELECT * FROM income_category WHERE user_id = :user_id AND category = :incomeType";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'user_id'    => $user_id,
            'incomeType' => $incomeType,
        ]);
        $response = $this->validateResponse($result); 
        if($response -> data != 0){
             return $response->data = "exist";           
            } 
        else
            {  
                /** create new entry */
                $query     = "INSERT INTO income_category( user_id, category ) VALUES (:user_id, :incomeType)";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        'user_id'        => $user_id,
                        'incomeType'     => $incomeType,
                    ]);
                        if ($statement)
                            {
                                return $response -> data = "true";
                            }
                        else
                            {
                                return $response -> data = "false";
                            }
            }
 }

/** get category */
 function get_income_category($userId) {    
    $query  = "SELECT * FROM income_category WHERE user_id = :userId OR user_id = :default_id" ;
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'userId' => $userId,
             'default_id' => 0,
        ]);
    return   $this->validateResponse($result);
    
} 
/** get in come */
function get_income($userId) {    
    $query  = "SELECT * FROM income WHERE user_id = :userId  ORDER BY id DESC";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'userId' => $userId,
        ]);
    return   $this->validateResponse($result);
    
} 
function delete_income($userId,$income_id){
    $response = new stdClass();
    $query  = "DELETE FROM income WHERE user_id = :userId AND id = :income_id";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'userId' => $userId,
            'income_id' => $income_id
        ]);
    if($result){
        $response -> data = "true";
        return $response;
    }else{
        $response -> data = "false";
        return $response;
    }
}
################################################end of income of income function###########################################################



################################################start of expense function###########################################################
/**add income */
function add_expense($expenseType,$expenseAmount,$expenseDate,$description,$user_id){  
    $query      = "SELECT * FROM expense WHERE user_id = :user_id AND expense_type = :expenseType AND expense_date = :expenseDate ";
    $result = $this->pdo->prepare($query);
    $result->execute
        ([
            'user_id'    => $user_id,
            'expenseType' => $expenseType,
            'expenseDate'    => $expenseDate
        ]);
 
        $response = $this->validateResponse($result);
 
        if($response -> data != 0){
             return $response->data = "exist";           
            } 
        else
            {  
                /** create new entry */
                $query     = "INSERT INTO expense(user_id, expense_type, expense_amount, expense_date, expense_description) VALUES (:user_id, :expenseType, :expenseAmount, :expenseDate, :description)";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        'user_id'        => $user_id,
                        'expenseType'     => $expenseType,
                        'expenseAmount'   => $expenseAmount,
                        'expenseDate'     => $expenseDate,
                        'description'    => $description,
                    ]);
                        if ($statement)
                            {
                                return $response -> data = "true";
                            }
                        else
                            {
                                return $response -> data = "false";
                            }
            }
 
 }   
 /**update income */
 function update_expense($incomeType,$incomeAmount,$incomeDate,$description,$user_id, $income_id){  
    
                 /** create new entry */
                 $query     = "UPDATE income SET income_type=:incomeType, income_amount=:incomeAmount, income_date=:incomeDate, income_description=:description WHERE id=:income_id AND user_id=:user_id";
                 $statement = $this->pdo->prepare($query);
                 $statement->execute
                     ([
                         'user_id'        => $user_id,
                         'incomeType'     => $incomeType,
                         'incomeAmount'   => $incomeAmount,
                         'incomeDate'     => $incomeDate,
                         'description'    => $description,
                         'income_id'      => $income_id
                     ]);
                         if ($statement)
                             {
                                 return $response -> data = "true";
                             }
                         else
                             {
                                 return $response -> data = "false";
                             }
           
  }  
 /** add category */
 function add_expense_category($incomeType,$user_id){  
 
 
     $query      = "SELECT * FROM income_category WHERE user_id = :user_id AND category = :incomeType";
     $result = $this->pdo->prepare($query);
     $result->execute
         ([
             'user_id'    => $user_id,
             'incomeType' => $incomeType,
         ]);
         $response = $this->validateResponse($result); 
         if($response -> data != 0){
              return $response->data = "exist";           
             } 
         else
             {  
                 /** create new entry */
                 $query     = "INSERT INTO income_category( user_id, category ) VALUES (:user_id, :incomeType)";
                 $statement = $this->pdo->prepare($query);
                 $statement->execute
                     ([
                         'user_id'        => $user_id,
                         'incomeType'     => $incomeType,
                     ]);
                         if ($statement)
                             {
                                 return $response -> data = "true";
                             }
                         else
                             {
                                 return $response -> data = "false";
                             }
             }
  }
 
 /** get category */
  function get_expense_category($userId) {    
     $query  = "SELECT * FROM income_category WHERE user_id = :userId OR user_id = :default_id" ;
     $result = $this->pdo->prepare($query);
     $result->execute
         ([
             'userId' => $userId,
              'default_id' => 0,
         ]);
     return   $this->validateResponse($result);
     
 } 
 /** get in come */
 function get_expense($userId) {    
     $query  = "SELECT * FROM expense WHERE user_id = :userId  ORDER BY id DESC";
     $result = $this->pdo->prepare($query);
     $result->execute
         ([
             'userId' => $userId,
         ]);
     return   $this->validateResponse($result);
     
 } 
 function delete_expense($userId,$expense_id){
     $response = new stdClass();
     $query  = "DELETE FROM expense WHERE user_id = :userId AND id = :expense_id";
     $result = $this->pdo->prepare($query);
     $result->execute
         ([
             'userId' => $userId,
             'expense_id' => $expense_id
         ]);
     if($result){
         $response -> data = "true";
         return $response;
     }else{
         $response -> data = "false";
         return $response;
     }
 }
 ################################################end of expense function###########################################################
 
 







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