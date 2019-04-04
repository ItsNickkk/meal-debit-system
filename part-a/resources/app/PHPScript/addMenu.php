<?php
include('conn.php');

$id = mysqli_real_escape_string($con,$_POST['id']);
$type = mysqli_real_escape_string($con,$_POST['type']);
$name = mysqli_real_escape_string($con,$_POST['name']);
$price = mysqli_real_escape_string($con,$_POST['price']);

$sql = "INSERT INTO item (itemID, itemName, itemType, itemPrice)
	VALUES
	('".$id."','".$name."','".$type."','".$price."')";
if(!mysqli_query($con,$sql)){
echo 'Failed!'. $sql;

}
else{
	echo 'Item entry added!';
}
?>