<?php
include('conn.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$price = mysqli_real_escape_string($con,$_POST['price']);


$sql = "UPDATE item SET 


itemType ='".$type."',
itemName ='".$name."',
itemPrice ='".$price."'

WHERE

itemID = ".$id;

if(!mysqli_query($con,$sql)){
echo 'Failed!';

}
else{
	echo 'Menu item entry edited!';
}
?>