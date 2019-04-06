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
    <body background="../images/a2.jpg" style="background-size: cover;background-position: -10px;" >
    <center>
        <div class="container" style="background-image: url(../images/a4.jpg); ;background-size: cover;background-position: -90px;">
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

        <div class="container a" style="background-image: url(../images/s1.jpg);background-size: cover;background-position: -100px;">
                <h2><b>PARKINGS</b><small><em> <?php echo $_SESSION['username']; ?></em></small></h2>
        </div>
        
  
    <div class="rows">
            
          <div class="container2 c" style="background-image:url(../images/s7.jpg);">
                <h4><b>Ground Floor</b></h4>
            <hr>
             <div class="col-lg-8 form-group" >
               <span id="1" class="green"><small><em>1</em></small></span>
               <span id="2" class="green"><small><em>2</em></small></span>
               <span id="3" class="green"><small><em>3</em></small></span>
               <span id="4" class="green"><small><em>4</em></small></span>
               <span id="5" class="green"><small><em>5</em></small></span>
               <br>
               <br>
               <span id="6" class="green"><small><em>6</em></small></span>
               <span id="7" class="green"><small><em>7</em></small></span>
               <span id="8" class="green"><small><em>8</em></small></span>
               <span id="9" class="green"><small><em>9</em></small></span>
               <span id="10" class="green"><small><em>10</em></small></span>
             </div>
         </div>
            
        <div class="container2 c" style="background-image:url(../images/s7.jpg);">
                <h4><b>First Floor</b></h4>
            <hr>
            <div class="col-lg-8 form-group">
               <span id="11" class="green"><small><em>1</em></small></span>
               <span id="12" class="green"><small><em>2</em></small></span>
               <span id="13" class="green"><small><em>3</em></small></span>
               <span id="14" class="green"><small><em>4</em></small></span>
               <span id="15" class="green"><small><em>5</em></small></span>
               <br>
               <br>
               <span id="16" class="green"><small><em>6</em></small></span>
               <span id="17" class="green"><small><em>7</em></small></span>
               <span id="18" class="green"><small><em>8</em></small></span>
               <span id="19" class="green"><small><em>9</em></small></span>
               <span id="20" class="green"><small><em>10</em></small></span>
            </div>
        </div>   
            
        <div class="container2 c " style="background-image:url(../images/s7.jpg);">
             <h4><b>Second Floor</b></h4>
            <hr>
             <div class="col-lg-8 form-group">
               <span id="21" class="green"><small><em>1</em></small></span>
               <span id="22" class="green"><small><em>2</em></small></span>
               <span id="23" class="green"><small><em>3</em></small></span>
               <span id="24" class="green"><small><em>4</em></small></span>
               <span id="25" class="green"><small><em>5</em></small></span>
               <br>
               <br>
               <span id="26" class="green"><small><em>6</em></small></span>
               <span id="27" class="green"><small><em>7</em></small></span>
               <span id="28" class="green"><small><em>8</em></small></span>
               <span id="29" class="green"><small><em>9</em></small></span>
               <span id="30" class="green"><small><em>10</em></small></span>
            </div>
        </div> 
      
    </div>

    </center>  
      <script>
    
                  
    function d(){
                 var xmlhttp = new XMLHttpRequest();
                 xmlhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200)
                   {
                     var x = this.responseText;
                     
                     var x= x.split(",");// convereting string received to array
                     for (var i=0 ;i < x.length ;i++)
                     {
                        document.getElementById(x[i]).style.color="white"; 
                        document.getElementById(x[i]).style.backgroundColor="black";
                         document.getElementById(x[i]).classList.remove("green");
                          document.getElementById(x[i]).classList.add("black");
                     }  
                    }
                };
              xmlhttp.open("GET", "../validation2.php", true);
              xmlhttp.send();
              }     
   
      d();       
    </script> 
    </body>
</html>
