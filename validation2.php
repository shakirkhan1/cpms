<?php
session_start();
include('config.php');


$q = "select * from park_space";
$result = mysqli_query($con, $q);
$a=[];
$i=0;
 while($row = mysqli_fetch_assoc($result))
{
	if($row['availability'] == 0)
	{
      $a[$i] =  $row['park_space_id'];
      $i = $i + 1;
    }
}
 echo implode(',', $a);
?>
