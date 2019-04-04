<?php

if(isset($_POST['login'])){
include('conn.php');

$username = mysqli_real_escape_string($con, $_POST['employeeID']);
$password = mysqli_real_escape_string($con, $_POST['employeePW']);

$sql = "Select * from employee where employeeID='".$username."' and employeePassword = '".$password."' and status = '1'";
$result = mysqli_query($con,$sql);

if(mysqli_num_rows($result)<=0){
	echo "<script>alert('Wrong username or password!');";
	die("window.history.go(-1);</script>");
}

if($row=mysqli_fetch_array($result)){
	session_start();
	$_SESSION['id'] = $row['employeeID'];
	$_SESSION['name'] = $row['employeeName'];
	$_SESSION['role'] = $row['employeeRole'];
	$_SESSION['pw'] = $row['employeePassword'];
	$_SESSION['loggedin'] = true;
}

if($_SESSION['role']==="0"){
	header("Location: ../mainmenu-admin.php");
}
else if($_SESSION['role']==="1"){
	header("Location:../mainmenu-employee.php" );
}
}
else{
	echo "<script>alert('Access Denied!');";
	die("window.history.go(-1);</script>");
}

?>
//