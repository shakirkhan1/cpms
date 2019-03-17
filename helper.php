<?php
include 'config.php';

  // selecting database to accsess the tables created for registration 
	
      $s= "select * from total_space ";
	  $result = mysqli_query($con, $s);// execute the query
	 
	while($row = mysqli_fetch_assoc($result))
	{
 	    $available = $row['total_available'];
		$reserved = $row['total_reserved'];
		
	}


?>