<?php
session_start();
include('config.php');
include('view_parking.php');

//====================================================================================
//      checking the credentials and then directing the admin / employee to the main home page 
//====================================================================================
if(isset($_POST['login']))
	{ 
		// fetcing username and password from signin page 
		$name = $_POST['user_id']; 
		$pass = $_POST['password'];

		// to check whetherusername and password already exist in db
		$q = " select * from login where user_id = '$name' && password = '$pass' ";
		$result = mysqli_query($con, $q);// execute the query

		// checking duplicacy
		$num = mysqli_num_rows($result);

		 if($num == 1) // username and password uniquely exist 
			{
				//creating session variable to use username in homepage when he is loggedIn
				$_SESSION['username'] = $name;
				header('location:homepage.php');  // directing to home page
			}
		 else
			{
				header('location:index.php','!!Ooops Invalid credentials !!');
			}

	}
//================================================================================
//     if there is space in parking on entered date and time in/out the directing to                        
//     vehicle information page to get other details of the customer and its vehicle
//================================================================================
   if(isset($_POST['move_to_checkout']))
	{
		if($_POST['select_date'] != "" && $_POST['check_in'] != "")
		{
          $date_org = $_POST['select_date'] ;
	      $in = $_POST['check_in'].":00" ;
	      // $out = $_POST['check_out'].":00" ;

	       // formatting the entered date to YYYY-mm-dd
	       $date=date('Y-m-d', strtotime($date_org));

		  // echo $date." ";
		  // echo $in." ";
		  // echo $out;
		  // die();

	       $s1 = "select * from total_space ";
	       $result1 = mysqli_query($con, $s1);// execute the query
		  // $num = mysqli_num_rows($result1);
	       $row = mysqli_fetch_row($result1);
	        //echo $row[0] ;
	   
			 if($row[0] > 0) // it means there is available space in parking
			{
				$s11 = "select * from park_space ";
		        $result11 = mysqli_query($con, $s11);// execute the query
			    
		        $flag = 0;
		        while($row1 = mysqli_fetch_assoc( $result11 ))
		        {
		        	if($row1['availability'] == '1')
		        	{
		        		$_SESSION['park_space_id'] = $row1['park_space_id'];
		        		$_SESSION['s_avil_id'] = $row1['slot_id'];
		        		$flag = 1;
		        		break;
		        	}
		        }
		        if($flag = 1) // means ,for sure, there is available parking space 
		        {
		        	$flag = 0;
		        	$k = $_SESSION['s_avil_id'];
		        	$i = $_SESSION['park_space_id'];
		           $s = "update park_space set availability ='0' where slot_id = '$k' ";
			       mysqli_query($con, $s);
		           // echo $_SESSION['s_avil_id'];
		           // die();

		           //=========================================================================

		           //=========================================================================

		           // storing values for later use
				$_SESSION['date'] = $date;
				$_SESSION['in'] = $in;
				

			  $q ="insert into check_space (park_date, park_in, park_space_id) values ('$date', '$in', '$i')";
			  mysqli_query($con, $q);

	            // getting the slot id 
			   $s11="select v_id from check_space where park_date='$date' && park_in='$in' ";
		        $result1 = mysqli_query($con, $s11);
		        $row = mysqli_fetch_row($result1);

		        $_SESSION['slot_id'] = $row[0];
		        // echo $row[0];
		        // die();
                //echo "fun(". $_SESSION['park_space_id'].")";
				header('location: vehicle details/vehicle_details.php','successfull movement');
		        }
			}
			else{// all slot are reserved
				header('location: check slot/check_slot.php','!!oops no space ');

			}

		}
	else{
		header('location: check slot/check_slot.php');
	}
  }


//================================================================================
//  storing the vehicle details
//================================================================================
   if(isset($_POST['vehicle_info']))
   {
	  if($_POST['vehicle_model'] != "" && $_POST['vehicle_no'] != "" && $_POST['wheeler_type'] != "" &&   $_POST['name'] != "" && $_POST['mobile_no']!= "")
       {
	        $vehicle_model = $_POST['vehicle_model'];
			$vehicle_no = $_POST['vehicle_no'];
			$wheeler_type = $_POST['wheeler_type'];
			$name = $_POST['name'];
			$mobile_no = $_POST['mobile_no'];
	        
	        $slot_id = $_SESSION['slot_id'];
			// echo $_SESSION['slot_id']." ";
			// echo $name." ";
			// echo $_SESSION['in'];
			// die();

			$s = "insert into vehicle_details (vehicle_model, vehicle_no, wheeler_type, name, mobile_no, slot_id ) values ('$vehicle_model', '$vehicle_no', '$wheeler_type', '$name', '$mobile_no', '$slot_id' )";
			 mysqli_query($con, $s);

			 //=============  UPDATE SPACE IN PARKING ==========================================
			 //                reduce available slot 
			 //                increase reserved slot
			 //=================================================================================
			 $s= "select * from total_space ";
			 $result = mysqli_query($con, $s);// execute the query
			 
			while($row = mysqli_fetch_assoc($result))
			{
		 	    $available = $row['total_available'];
				$reserved = $row['total_reserved'];
			}

			$available = $available - 1;
			$reserved = $reserved + 1;
	         $s = "update total_space set total_available='$available', total_reserved='$reserved'";
			 mysqli_query($con, $s);
	        //==================================================================================

			 header('location: view parking/view_parking.php?x='.$_SESSION['park_space_id']);
      }
     else{
     	header('location: vehicle details/vehicle_details.php');
     }
	
  }



//=====================================================================================
//storing the registration id of this specific vehicle and directing it to final check out page
//=====================================================================================
    if(isset($_POST['move_to_final_checkout']))
	{
		$registration_id = $_POST['reg_id'] ;
		// echo $registration_id ;
		// die();

		$_SESSION['reg_id'] = $registration_id;
 		header('Location: final checkout/final_checkout.php');
	}

//====================================================================================
//                 delete records for that vehicle which is checking out 
//====================================================================================
    if(isset($_POST['final_checkout']))
	{

		$r_id = $_SESSION['reg_id'];
		// echo $_SESSION['reg_id'];

         // 1st getting the slot_id of the specific vehicle;
		$s = "select slot_id from vehicle_details where id='$r_id' ";
		$result= mysqli_query($con, $s);// execut query
		$row = mysqli_fetch_row($result);// fetch value
		$s_id = $row[0]; // set value

		//***************************************************************

		// getting the park_space_id of the vehicle where it is parked from slot_id obtained above;
		$s1 = "select park_space_id from check_space where v_id='$s_id' ";
		$result1= mysqli_query($con, $s1);// execut query
		$row1 = mysqli_fetch_row($result1);// fetch value
		$park_space_id1 = $row1[0]; // set value
      
		//***************************************************************


         // now deleting records
		$s1 = "delete from vehicle_details where id='$r_id' ";
		mysqli_query($con, $s1);	
		// echo $s_id;
		// die();
		$s2 = "delete from check_space where v_id='$s_id' ";
		mysqli_query($con, $s2);

		//***************************************************************
        //    update the parking slot from where the vehicle is checkout set it to = 0
		//***************************************************************
		 $s = "update park_space set availability ='1' where park_space_id = '$park_space_id1' ";
		 mysqli_query($con, $s);

		//================================================================================
		//                   update available and reserved slots for parking
		//================================================================================
		$s= "select * from total_space ";
		 $result = mysqli_query($con, $s);// execute the query
		 
		while($row = mysqli_fetch_assoc($result))
		{
	 	    $available = $row['total_available'];
			$reserved = $row['total_reserved'];
			
		}

		$available = $available + 1;
		$reserved = $reserved - 1;
         $s = "update total_space set total_available='$available', total_reserved='$reserved'";
		 mysqli_query($con, $s);

		 // echo '<script type="text/javascript">
   //                 fun("'.$park_space_id .'");  
   //             </script> ';

		 header('location: homepage.php');

	}

?>