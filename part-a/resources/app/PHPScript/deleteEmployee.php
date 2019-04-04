<?php session_start();
if($_SESSION['role']!=="0"){//Verify so that only admin can access this page
	echo "Access Denied, Nothing has changed";
}
include 'conn.php';
$id = mysqli_real_escape_string($con,$_POST['id']);
$sql = "update employee set status = 0 where employeeID=".$id;

$result=mysqli_query($con,$sql);

if(mysqli_affected_rows($con)<=0){
	echo "For some reason, Nothing has changed. Please try again!";
	mysqli_close($con);
}
else{
	echo "Command executed successfully!";
}


?>