<?php

  // to use session variable we do this
  session_start();
  // if now suppose user logout then he must be directed to login page and from there he must not able to go back to homepage without logging in

  if( !isset($_SESSION['username']))
  {
    header('location:login/login.php');
  }
   
?> 


<!DOCTYPE html>
<html>
    <head>
        <title>CPMS</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
         <link rel="stylesheet" type="text/css" href="../css/style.css">       
          <script src="../js/jquery-3.3.1.min.js"></script>
         <script type="text/javascript" src="../js/bootstrap.js"></script> 
         
    </head>
    <body background="../images/a2.jpg">
        <center>
            <div class="container " id="top" style="background-image: url(../images/a4.jpg);"> 
                <div class="row-lg-6">
                    <h1>Car Parking Management System</h1>
                    <a href="../homepage.php"><img src="../images/slot.jpg" alt="CPMS"></a>
                </div>
            </div>

            <div class="container style" style="background-image: url(../images/back3.jpg);">
                <div class="col-lg-2 "><a href="../view parking/view_parking.php"><b> VIEW PARKING</b></a></div>
                <div class="col-lg-2"><a href="../check slot/check_slot.php"><b>BOOK PARKING</b></a></div>
                <div class="col-lg-2"><a href="../booking details/booking_details.php"><b>BOOKING DETAILS</b></a></div>
                <div class="col-lg-2"><a href="../reg. Id/checkout.php"><b>CHECKOUT</b></a></div>
                <div class="col-lg-2"><a href="../availability/available.php"><b>AVAILABILITY</b></a></div>
                <div class="col-lg-2" id="right"><a href="../validate_logout.php"><b>LOGOUT</b></a></div>
            </div>
        
        <div class="container b" style="background-image: url(../images/s1.jpg);">
            <h3>Vehicle Details <small><em> <?php echo $_SESSION['username']; ?></em></small></h3>
        </div>
        
        <form method="post" action="../validation.php" >
            <div class="container2">
               <div class=" col-lg-8 form-group ">
                    <label class="form-control">Vehicle Model</label>
                    <input name="vehicle_model" type="text" class="form-control" required>
                </div> 
                <div class=" col-lg-8 form-group">
                    <label class="form-control">Vehicle no.</label>
                    <input name="vehicle_no" type="text" class="form-control" required>
                </div>   
            </div>
            <!-- ============================================================ -->
            <div class="container2">
                <div class="row-lg-6 col-lg-8 form-group">
                    <label class="form-control">Wheeler Type</label>
                    <input name="wheeler_type" type="text" class="form-control" required>
                </div> 
                <div class="row-lg-6 col-lg-8 form-group">
                    <button class="btn btn-success form-control" name="vehicle_info" type="submit">Submit</button>
                </div>               
            </div>
            <!-- =========================================================== -->
             <div class="container2">
                 <div class=" col-lg-8 form-group">
                    <label class="form-control">Customer Name</label>
                    <input name="name" type="text" class="form-control" required>
                </div> 
                 <div class="col-lg-8 form-group">
                    <label class="form-control">Customer Mobile no.</label>
                    <input name="mobile_no" type="text" class="form-control" required>
                </div> 
            </div> 
           <!--===========================================================  -->
        </form>   
        
    </center>
    </body>
</html>
