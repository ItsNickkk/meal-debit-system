<?php
date_default_timezone_set("Asia/Kuala_Lumpur");

$con=mysqli_connect("localhost","root","","meal-debit-system");

//Check Connection
if(mysqli_connect_errno())
{
	echo "Failed to connect to MySQL:".mysqli_connect_error();
}
?>