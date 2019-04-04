<?php
include('conn.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$ic = mysqli_real_escape_string($con,$_POST['ic']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$pass = mysqli_real_escape_string($con,$_POST['pass']);
$hp = mysqli_real_escape_string($con,$_POST['hp']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$add = mysqli_real_escape_string($con,$_POST['add']);
$role = mysqli_real_escape_string($con,$_POST['role']);

$sql = "UPDATE employee SET 

employeeIC ='".$ic."',
employeeName ='".$name."',
employeePhone ='".$hp."',
employeeEmail ='".$email."',
employeeAddress ='".$add."',
employeePassword ='".$pass."',
employeeRole ='".$role."'

WHERE

employeeID = ".$id;

if(!mysqli_query($con,$sql)){
echo 'Failed!';

}
else{
	echo 'Employee entry edited!';
}
?>