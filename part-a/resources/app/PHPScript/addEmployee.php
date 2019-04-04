<?php
include('conn.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$ic =mysqli_real_escape_string($con, $_POST['ic']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$role = mysqli_real_escape_string($con,$_POST['role']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$hp = mysqli_real_escape_string($con,$_POST['hp']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$add = mysqli_real_escape_string($con,$_POST['add']);
$sql = "INSERT INTO employee (employeeID, employeeIC, employeeName, employeeRole, employeePhone, employeeEmail, employeeAddress, employeePassword)
	VALUES
	('".$id."','".$ic."','".$name."','".$role."','".$hp."','".$email."','".$add."','".$pass."')";
if(!mysqli_query($con,$sql)){
echo 'Failed!'. $sql;

}
else{
	echo 'Employee entry added!';
}
?>