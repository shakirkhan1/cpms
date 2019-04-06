<!DOCTYPE html>
<html>
    <head>
        <title>CPMS</title>
         <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
          <script src="js/jquery-3.3.1.min.js"></script>
         <script type="text/javascript" src="js/bootstrap.js"></script>   
    </head>
<body background="images/w5.jpg" style="background-size: cover;">
   <center>
     <div class="container" style="background-image: url(images/a6.jpg);background-size: cover;background-position: -30px;">
        <div class="row-lg-6">
            <br>
            <h1 ><strong>Car Parking Management System</strong></h1>
            <!-- <a href="#"><img src="../images/back3.jpg" alt="CPMS"></a> -->
            <br>
        </div>
     </div>
    <div class="row-lg-6">
        <div class="container a" style="background-image: url(images/s2.jpg);background-size: cover;background-position: 10px;">
            <h2><b>Login</b></h2>

        </div>
       <form class="container2" id="login_form" method="post" action="validation.php"  style="background-image: url(images/a5.jpg);background-size: cover;">

           <h2 class="form-signin-heading"><strong>Please Sign In</strong></h2>
           <h5 style="color:white"><em>( for employees only )</em></h5>

            <div class="row-lg-6 form-group">
                <label class="sr-only">User ID</label>
                <input type="text" name="user_id" class="form-control" placeholder="User ID" required autofocus>
            </div> 

            <div class="row-lg-6 form-group">
                 <label class="sr-only">Password</label>
                 <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div> 
            <button class="btn btn-success" name="login" type="submit">Sign In</button>

        </form>   
    </div> 

   </center>
</body>
</html>
