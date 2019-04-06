<?php

  // to use session variable we do this
  session_start();
  // if now suppose user logout then he must be directed to login page and from there he must not able to go back to homepage without logging in

  if( !isset($_SESSION['username']))
  {
    header('location:index.php');
  }
    

  include '../config.php';
  $r_id = $_SESSION['reg_id'];
  $s ="select * from vehicle_details inner join check_space on vehicle_details.slot_id = check_space.v_id && vehicle_details.id = '$r_id' ";
  $res = mysqli_query($con, $s);

   while($row = mysqli_fetch_assoc($res))
  {
    $in = $row['park_in'];
  }
  //=============== conerting check_in time in to minutes ================================================
      $time1 = explode(':', $in);
      $h_to_min1 = ((int)$time1[0]) * 60;
      $min1 = ((int)$time1[1]);
      $sec1 = ((int)$time1[2])/60;
      $final_in1 = ( $h_to_min1 + $min1 + $sec1 );

  //=============================================================================================
  //============== getting and converting current time to minutes ===============================

      // echo date_default_timezone_get() ;
      date_default_timezone_set("Asia/Kolkata");
      $current_time = date("h:i:sa");
      // echo "The time is " . $current_time;
      // die();
      $time2 = explode(':', $current_time);
      $h_to_min2 = ((int)$time2[0]) * 60;
      $min2 = ((int)$time2[1]);
      $sec2 = ((int)$time2[2])/60;
      $final_in2 = ( $h_to_min2 + $min2 + $sec2 );

  //==================== GETTING TOTAL TIME VEHICLE WAS PARKED IN ==============================
      if($final_in1 > $final_in2)
      {

        $final_in = $final_in1 - $final_in2 ;
      }
      else{
            $final_in = $final_in2 - $final_in1 ;
      }
  //============================================================================================
      $res = mysqli_query($con, $s);

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
    <body background="../images/a2.jpg" style="background-size: cover;background-position: -10px;">
        <center>
            <div class="container " id="top" style="background-image: url(../images/a4.jpg);background-size: cover;background-position: -120px -200px;">
                <div class="row-lg-6">
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
                <h2><b>Check Out</b><small><em><?php echo $_SESSION['username']; ?></em></small></h2>
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
                    <th style="background-image: url(../images/back5.jpg);">Check Out</th>  
                </tr>
                <?php while($row = mysqli_fetch_assoc($res)): ?>
                <tr >
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['id']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['name']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['mobile_no'];?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['vehicle_model']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['vehicle_no']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['wheeler_type']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['park_date']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $row['park_in']; ?></b></td>
                  <td style="background-image: url(../images/s4.jpg);"><b><?php echo $current_time ; ?></b></td>
                </tr>
            <?php endwhile;?>
            </table>
      <form method="post" action="../validation.php">

         <div class="container2">
            <div class="col-lg-8 form-group">
                <label class="form-control">Pay</label>
            </div>
        </div>
        <div class="container2">
             <div class="col-lg-8 form-group">
                <label class="form-control"><strong><em>Rs. </em></strong> <?php echo (($final_in/30) * 5) ;?></label>
            </div>
        </div>
           
        <div class="container2 form-group">
          <div class="col-lg-8 form-group">
          <button class="btn btn-success form-control" type="submit" name="final_checkout"><strong>PAY</strong></button>
         </div>               
        </div>

      </form>
    </center>
</body>
</html>
