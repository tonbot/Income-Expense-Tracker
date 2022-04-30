

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
        <title>budgetracking</title>
        <link rel="stylesheet" href="resources/customCss/dashboard.css">
        <script src="resources/customJs/dashboard.js"></script>
    </head>
    <body>
        <div>
            <div class="row sidenavContainer">
                    <!-- including sidenav -->
                  <?php require "resources/sidenav/sidenav.php" ?>
                    <!--sidenav  ends here -->
                <div class="col-lg-10 bg-light container2">
                    <!-- including topnav -->
                    <?php require 'resources/topnav/topnav.php' ?>
                    <!-- topnav ends here -->
                    <h4 class="my-3 ml-5">Dashboard</h4>
                    <div>
                   
                    </div>  
                </div>
            </div>
        </div>
    </body>
 </html>