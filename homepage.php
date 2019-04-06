<?php

  // to use session variable we do this
  session_start();
  // if now suppose user logout then he must be directed to login page and from there he must not able to go back to homepage without logging in

  if( !isset($_SESSION['username']))
  {
    header('location:index.php');
  }
  
?> 
<?php include 'header.php' ;?>

        <div class="container style" style="background-image: url(images/back3.jpg);background-size: cover;background-position: -30px;">
             <div class="col-lg-2 "><a href="view parking/view_parking.php"><b> VIEW PARKING</b></a></div>
            <div class="col-lg-2"><a href="check slot/check_slot.php"><b>BOOK PARKING</b></a></div>
             <div class="col-lg-2"><a href="booking details/booking_details.php"><b>BOOKING DETAILS</b></a></div>
             <div class="col-lg-2"><a href="reg. Id/checkout.php"><b>CHECKOUT</b></a></div>
             <div class="col-lg-2"><a href="availability/available.php"><b>AVAILABILITY</b></a></div>
             <div class="col-lg-2" id="right"><a href="validate_logout.php"><b>LOGOUT</b></a></div> 
        </div>

        <div class="container a" style="background-image: url(images/s1.jpg);background-size: cover;background-position: -30px;">
          <h2><b>Welcome To Car Parking Management System </b><em><?php echo $_SESSION['username']; ?></em></h2>
        </div>
        <div class="form-group">
          <div class="d" style="background-image: url(images/w5.jpg);">
                <h3>Feasibility & Profitability</h3>
                <p>The design flexibility of Car Parking Systems can help in terms of both feasibility and profitability by enabling parking to be located in areas where conventional parking won't fit.</p>
            </div>
            <div class="d" style="background-image: url(images/w5.jpg);">
              <h3>Inherent Safety & Security</h3>
                <p>The safety and security of cars, drivers and pedestrians is always a priority 
                  for parking garage development projects.</p>
            </div>
            <div class="d" style="background-image: url(images/w5.jpg);">
                <h3>Eco-Friendly & Sustainably</h3>
                <p>Car Parking Systems can reduce CO2 emissions by 85% or more sby eliminating the need for cars to drive and idle while searching for parking spaces.</p>
            </div>
        </div>
            
  <?php include 'footer.php' ;?>