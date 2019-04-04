<?php
include('conn.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$bal = mysqli_real_escape_string($con,$_POST['bal']);


$sql = "UPDATE customer SET 


customerBalance =".$bal."

WHERE

customerID = ".$id;

if(!mysqli_query($con,$sql)){
	echo 'Failed!'.$sql;
}
else{
	echo 'Balance Updated!';
}
?>