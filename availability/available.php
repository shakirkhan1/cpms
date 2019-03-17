<?php 

  // to use session variable we do this
  session_start();
  // if now suppose user logout then he must be directed to login page and from there he must not able to go back to homepage without logging in

  if( !isset($_SESSION['username']))
  {
    header('location:login/login.php');
  }
 else{
     include '../helper.php';
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
        <div class="container" style="background-image: url(../images/a4.jpg);">
            <div class="row-lg-6" >
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

        <div class="container a" style="background-image: url(../images/s1.jpg);">
                <h2><b>Available Parking Slot Details</b><small><em><?php echo $_SESSION['username']; ?></em></small></h2>
        </div>
        
        <div class="container b" style="background-image: url(../images/s4.jpg);">
            <form>
                <div class="container2">
                  <div class=" col-lg-8 form-group ">
                    <label for="Model" class="form-control">Available Slots</label>
                    <label for="Model" class="form-control"><?php echo $available; ?></label>
                  </div> 
              </div>
                <div class="container2">
                  <div class=" col-lg-8 form-group">
                    <label for="type" class="form-control">Reserved Slots</label>
                    <label for="type" class="form-control"><?php echo $reserved; ?> </label>
                  </div>   
                </div> 
            </form>
        </div>
       
    </center>  
    </body>
</html>
