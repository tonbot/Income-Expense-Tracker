 <!-- including bootstrap resources -->
 <?php 
   include_once('resources/include.php');
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- custom resources -->
    <link rel="stylesheet" href="resources/customCss/signup.css">
    <script src="resources/customJs/signup.js"></script>
</head>
<body class="bg-light">
       <div class="container">
               <div class="row">
                         <div class="col-lg-4" id="title">
                              <div class="text-center mt-5"><img class="mt-5" src="resources/images/budjectlogo.png" alt=""></div>
                              <h3 class="text-center">Welcome Back</h3>
                         </div>

                         <div class="col-lg-8 px-5">
                              <h2 class="text-center  text-warning mt-4">Create Account</h2>
                              <h6 class="text-center text-warning mb-3"><small>All fields are required</small></h6>
                              <div class="py-1" id="error">Please fill out all the fields.</div>
                              <form method="post">

                                   <div class="row">
                                   <div class="col-6">
                                        <label for="firstname">* Firstname</label>
                                        <input id="firstName" class="form-control  mb-3" type="text" name="" required>
                                   </div>
                                   <div class="col">
                                        <label for="lastname">* Lastname</label>
                                        <input id="lastName" class="form-control mb-3" type="text" name="" required>   
                                   </div>
                                   </div>  
                                   <div class="row">
                                   <div class="col-6">
                                        <label for="email">* Email</label>
                                        <input id="email" class="form-control  mb-3" type="email" name="" required>
                                   </div>
                                   <div class="col">
                                        <label for="phonenumber">* Phone</label>
                                        <input id="phoneNumber" class="form-control mb-3" type="number" name="" required>   
                                   </div>
                                   </div>  
                                   <div class="row">
                                   <div class="col-6">
                                        <label for="username">* Password</label>
                                        <input id="password" class="form-control  mb-3" type="password" name="" required>
                                   </div>
                                   <div class="col">
                                        <label for="confirmPassword">* Confirm Password</label>
                                        <input id="confirmPassword" class="form-control mb-3" type="password" name="" required>   
                                   </div>
                                   </div>  
                              
                              
                                   <div class="text-center"><button id="register" class="botton mt-3" type="button"> SignUp <span ><i class="fas fa-lock"></i></span></button></div>
                                   <h6 class="text-center mt-3 text-white"><small>Have an account? <a class="" href="login.php">Login</a></small></h6>
                              </form>
                        </div>
               </div>
        </div>
</body>
</html>