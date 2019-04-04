<?php
$type = $_POST['req'];
include('conn.php');
if($type =="emp"){
	$sql = "SELECT max(employeeID) as max FROM `employee`";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$max = $row['max'];
	$max = $max+1;
	echo $max;
}

else if($type =="menu"){
	$sql = "SELECT max(itemID) as max FROM `item`";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$max = $row['max'];
	$max = $max+1;
	echo $max;
}

else if($type =="cust"){
	$sql = "SELECT max(itemID) as max FROM `item`";
	$result = mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
	$max = $row['max'];
	$max = $max+1;
	echo $max;
}