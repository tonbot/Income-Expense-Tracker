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

###############################################################################################################

function register($firstName, $lastName, $email, $phoneNumber, $password) // register user
 {  
     ///////////////check if email or phonenumber is already registered
    $query      = "SELECT * FROM user WHERE email='$email' OR PhoneNumber='$phoneNumber'";
    $result_set = $this->pdo->query($query);
    $result     = $result_set->fetchall();
    $count      = sizeof($result);

        if($count > 0)
            {
                return "exist";
            } 
        else
            {  ///// Creating new User
                $query     ="INSERT INTO user(firstName, lastName, email, phoneNumber, password) VALUES (:firstName, :lastName, :email, :phoneNumber, :password)";
                $statement = $this->pdo->prepare($query);
                $statement->execute
                    ([
                        'firstName'    => $firstName,
                        'lastName'     => $lastName,
                        'email'        => $email,
                        'phoneNumber'  => $phoneNumber,
                        'password'     => $password,
                    ]);
                        if ($statement)
                            {
                                return "success";
                            }
                        else
                            {
                                return "failed";
                            }
            }

 }   //Register function ends here.

###############################################################################################################
 
    function login($email, $password) // login user;
        { 
            $query  = "SELECT * FROM user WHERE email =:email AND password =:password" ;
            $result = $this->pdo->prepare($query);
            $result->execute
                ([
                    'email'    => $email,
                    'password' => $password,
                ]);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result= $result->fetchall();
            $count=sizeof($result);
                if ($count > 0)
                    {
                        return json_encode($result);
                    }
                else
                    {
                        return 'user not found';
                    }
            
    
        } //Login user ends here
 


###############################################################################################################
       
function addIncome($incomeType,$incomeAmount,$incomeDate,$description,$user_id) // register user
{  
    ///////////////check if email or phonenumber is already registered
   $query      = "SELECT * FROM income WHERE user_id='$user_id' AND income_type='$incomeType' AND income_date='$incomeDate' ";
   $result_set = $this->pdo->query($query);
   $result     = $result_set->fetchall();
   $count      = sizeof($result);

       if($count > 0)
           {
               
                
                return "Income type already exist for this date";
                   
           } 
       else
           {  ///// Creating new User
               $query     ="INSERT INTO income(user_id, income_type, income_amount, income_date, income_description) VALUES (:user_id, :incomeType, :incomeAmount, :incomeDate, :description)";
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
                               return "success";
                           }
                       else
                           {
                               return "failed";
                           }
           }

}   //Register function ends here.

###############################################################################################################

  function resetpassword($email, $newpass)
  {
    $query      = "UPDATE students_profile  SET  passwordd='$newpass' WHERE email='$email'";
    $result_set =  $this->pdo->exec($query);
        if ($result_set)
        {
            return $result_set;
        }
  }


###############################################################################################################

  function remove($income_id,$user_id)
  {
    $query      = "DELETE FROM income WHERE user_id='$user_id' AND id='$income_id' ";
    $result_set =  $this->pdo->exec($query);
        if ($result_set)
        {
            return 'success';
        }
  }
 
###############################################################################################################
  ///start of income pagination
  function get_data($user_id, $current_page)
  {
      ///Getting the total number of records
    $query1="SELECT * FROM income WHERE user_id='$user_id'";       
    $result=$this->pdo->query($query1);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    $result=$result->fetchAll();
    $number_Of_records= sizeof($result);       
      ///if number of records is less than 5 no pagination is created
    if ($number_Of_records <= 5)
        {
           foreach($result as $data)
           {
               $pagination='<tr>';
               $pagination.='<td>'.$data['id'] .'</td>';
               $pagination.='<td>'.$data['income_type'].'</td>';
               $pagination.='<td>'.$data['income_amount'].'</td>';
               $pagination.='<td>'.$data['user_id'].'</td>'; 
               $pagination.='<td>'.$data['income_date'].'</td>';
               $pagination.='<td><button  type="button" class="btn btn-primary" onclick=edit('.$data['id'] .')>Edit</button>
               <button  type="button" class="btn btn-danger" onclick=remove('.$data['id'] .')>Delete</button></td>';
               $pagination.='</tr>';
               $response[]=array(
                'data' => $pagination
            );

           }
           
           return ($response);
        } ///end if

     ///if number of records is greater than 5 then pagination  start here
    else
        {

            $records_per_page=5; //total records display per page
            $number_of_pages = ceil($number_Of_records/$records_per_page); //calculating total page
            $previous_records=($current_page-1)*$records_per_page; //calculating previous records
            
            ///if previous records is equal to zero then current page is equal 1
            if  ( $previous_records == 0)
                    {
                        $current_page=1;
                        $query1="SELECT * FROM income WHERE user_id='$user_id' LIMIT $current_page, $records_per_page" ;       
                        $result=$this->pdo->query($query1);
                        $result->setFetchMode(PDO::FETCH_ASSOC);
                        $result=$result->fetchAll();
                        //SELECTING RECORDS FOR OUTPUT
                            foreach($result as $data)
                                {
                                    $pagination='<tr>';
                                    $pagination.='<td>'.$data['id'] .'</td>';
                                    $pagination.='<td>'.$data['income_type'].'</td>';
                                    $pagination.='<td>'.$data['income_amount'].'</td>';
                                    $pagination.='<td>'.$data['user_id'].'</td>'; 
                                    $pagination.='<td>'.$data['income_date'].'</td>';
                                    $pagination.='<td><button  type="button" class="btn btn-primary" onclick=edit('.$data['id'] .')>Edit</button>
                                    <button  type="button" class="btn btn-danger" onclick=remove('.$data['id'] .')>Delete</button></td>';
                                    $pagination.='</tr>';             
                                    $response[]=array('data' => $pagination );
                        
                                }
                            //creating page link
                                  $link =''; $i=1;
                          while( $i <=  $number_of_pages) 
                                {                                              
                                   $link .='<li class="pag" onclick=pagi('.$user_id.',' .$i. ')>';
                                   $link .= $i;
                                   $link .='</li>';
                                   $pagelink[]=array('pagelink' => $link );
                                   $i++ ;
                                }
                                   $response_data[]=array($response,$link);                            
                        return ($response_data);
                         
                    } 
                else
                    {    
                            $query1="SELECT * FROM income WHERE user_id='$user_id' LIMIT $previous_records,$records_per_page" ;       
                            $result=$this->pdo->query($query1);
                            $result->setFetchMode(PDO::FETCH_ASSOC);
                            $result=$result->fetchAll();
                            //SELECTING RECORDS FOR OUTPUT
                            foreach($result as $data)
                                {
                                    $pagination='<tr>';
                                    $pagination.='<td>'.$data['id'] .'</td>';
                                    $pagination.='<td>'.$data['income_type'].'</td>';
                                    $pagination.='<td>'.$data['income_amount'].'</td>';
                                    $pagination.='<td>'.$data['user_id'].'</td>'; 
                                    $pagination.='<td>'.$data['income_date'].'</td>';
                                    $pagination.='<td><button  type="button" class="btn btn-primary" onclick=edit('.$data['id'] .')>Edit</button>
                                    <button  type="button" class="btn btn-danger" onclick=remove('.$data['id'] .')>Delete</button></td>';
                                    $pagination.='</tr>';                
                                    $response[]=array('data' => $pagination);
                                }
                                //creating page link
                                      $link =''; $i=1;
                          while( $i <=  $number_of_pages)
                               {    
                                    $link .='<a href="#">';
                                    $link .='<li class="pag" onclick=pagi('.$user_id.',' .$i. ')>';                                              
                                    $link .= $i;
                                    $link .='</li>';
                                    $link .='</a>';
                                    $pagelink[]=array('pagelink' => $link);
                                              $i++ ;
                               }
                                    $response_data[]=array($response,$link);           
                         return ($response_data);
                    }


        }
  

               
    
                               


  }





 }
 ?>