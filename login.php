 
 <?php 
  # including bootstrap resources 
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
    <link rel="stylesheet" href="resources/customCss/login.css">
    <script src="resources/customJs/login.js"></script>
</head>
<body class="bg-light">
       <div class="container">
         <div class="row">

          <div class="col-lg-6" id="title">
            <div class="text-center mt-5 "><img class="mt-5" src="resources/images/budjectlogo.png" alt=""></div>
            <h3 class="text-center animated__animate animate__backInDown">Welcome Back</h3>
          </div>

          <div class="col-lg-6 px-5">
             <div class="text-center mt-5"><img src="resources/images/userICON.png" width="25%" height="auto" alt=""></div>
             <div class="py-1" id="error">Please fill out all the fields.</div>
             <form action="" method="post">
             <label for="username">* Email</label>
             <input class="form-control  mb-3" type="text" name="" id="email">
             <label for="password">* Password</label>
             <input class="form-control mb-3" type="password" name="" id="password">
             <div class="mb-4"><span class="text-white"><input type="checkbox" class="text-light"> 
              Remember me</span> <span class="text-right ml-5 pl-4"><small><a class="forgot" href="">Forgot Password?</a></small></span></div>
             <div class="text-center"><button class="botton" type="button" id="login">Login <span ><i class="fas fa-lock"></i></span></button></div>
             <h6 class="text-center mt-3 text-white"><small>Don't have an account? <a class="" href="signup.php">Sign-up</a></small></h6>
             </form>
          </div>
         </div>
       </div>

      
</body>
</html>