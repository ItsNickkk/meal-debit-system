<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
session_start();
include('conn.php');

$itemID = $_POST['itemID'];
$paymentQR = mysqli_real_escape_string($con,$_POST['paymentqr']);
$total = mysqli_real_escape_string($con,$_POST['total']);
$date = date('Y-m-d H:i:s');
$memberid = substr($paymentQR, 0,7);
$payAmount = substr($paymentQR, 10);

//INSERT INTO ORDER TABLE
$sqlmax="Select MAX(transactionID) from `order`";//Select largest value of transaction ID
$resultmax = mysqli_query($con,$sqlmax);
$rowsmax=mysqli_fetch_array($resultmax);
$maxtranid=$rowsmax['MAX(transactionID)'];
$newmaxtranid=$maxtranid + 1; //Add 1 to the largest value of Car ID to autogenerate car ID for next entry

$uniqueArray = array_values(array_filter(array_unique($itemID)));
$countUniqueArray = count(array_unique($itemID));
$itemQty = array_count_values($itemID);
for($i=0; $i<$countUniqueArray; $i++){
$thisItemID=$uniqueArray[$i];
$sqladd = "INSERT INTO `order`
		(transactionID, customerID, employeeID, itemID, itemQuantity, datetime, total) 
		VALUES
		('".$newmaxtranid."','".$memberid."','".$_SESSION['id']."','".$thisItemID."','".$itemQty[$thisItemID]."','".$date."','".$total."')";
$resultadd=mysqli_query($con,$sqladd);

if(mysqli_affected_rows($con)<=0){
	echo $sqladd;
	echo "Nothing is added!";
}
else{
	echo "success";
}
}
?>
