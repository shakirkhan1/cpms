<?php
 
  // to use session variable we do this
  session_start();
  // if now suppose user logout then he must be directed to login page and from there he must not able to go back to homepage without logging in

  if( !isset($_SESSION['username']))
  {
    header('location:index.php');
  }

  include '../config.php';

  $s ="select * from vehicle_details inner join check_space on vehicle_details.slot_id = check_space.v_id";
  $res = mysqli_query($con, $s);
  // echo date_default_timezone_get() ;
      date_default_timezone_set("Asia/Kolkata");
      $current_time = date("h:i:sa");
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
            <div class="container " id="top" style="background-image: url(../images/a4.jpg);background-size: cover;background-position: -120px -200px;">
                <div class="row-lg-6" >
                    <h1>Car Parking Management System</h1>
                    <a href="../homepage.php"><img src="../images/slot.jpg" alt="CPMS"></a>
                </div>
            </div>

        <div class="container style" style="background-image: url(../images/back3.jpg);background-size: cover;background-position: -100px;">
            <div class="col-lg-2 "><a href="../view parking/view_parking.php"><b> VIEW PARKING</b></a></div>
            <div class="col-lg-2"><a href="../check slot/check_slot.php"><b>BOOK PARKING</b></a></div>
            <div class="col-lg-2"><a href="../booking details/booking_details.php"><b>BOOKING DETAILS</b></a></div>
            <div class="col-lg-2"><a href="../reg. Id/checkout.php"><b>CHECKOUT</b></a></div>
            <div class="col-lg-2"><a href="../availability/available.php"><b>AVAILABILITY</b></a></div>
            <div class="col-lg-2" id="right"><a href="../validate_logout.php"><b>LOGOUT</b></a></div>
        </div>
            <div class="container a" style="background-image: url(../images/s1.jpg);">
                <h2><b>Booking Details</b><small><em><?php echo $_SESSION['username']; ?></em></small></h2>
            </div>
        
            <table >
                <tr>
                    <th style="background-image: url(../images/back5.jpg);">Registration Id</th>
                    <th style="background-image: url(../images/back5.jpg);">Name</th>
                    <th style="background-image: url(../images/back5.jpg);">Mobile no</th>
                    <th style="background-image: url(../images/back5.jpg);">Model</th>
                    <th style="background-image: url(../images/back5.jpg);">Vechile no.</th>
                    <th style="background-image: url(../images/back5.jpg);">Type</th>
                    <th style="background-image: url(../images/back5.jpg);">Date</th>
                    <th style="background-image: url(../images/back5.jpg);">Check In</th>
                    <!-- <th style="background-image: url(../images/back5.jpg);">Check Out</th> -->  
                </tr>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['id']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['name']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['mobile_no'];?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['vehicle_model']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['vehicle_no']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['wheeler_type']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['park_date']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['park_in']; ?></b></td>
                  <!-- <td style="background-image: url(../images/s4.jpg);"><b><?php echo $current_time ; ?></b></td> -->
                </tr>
            <?php endwhile;?>
               
            </table>
        
        
        </center>
    </body>
</html>
