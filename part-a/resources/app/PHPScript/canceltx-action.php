<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
session_start();
$currid=$_SESSION['name'];
include ('conn.php');
$txid = mysqli_real_escape_string($con,$_POST['txid']);
$custid = mysqli_real_escape_string($con,$_POST['custid']);
$reasoncombo=mysqli_real_escape_string($con,$_POST["reasonCombo"]);
$reason=mysqli_real_escape_string($con,$_POST['reasonTxt']);
$date = date('Y-m-d H:i:s');
$sql="UPDATE `order` SET
	status='0', remark='Cancelled by ".$currid.", at ".$date." Reason: ";
if($reasoncombo=='other'){
	$sql=$sql.$reason."' WHERE transactionID=".$txid."";
}
else if($reasoncombo=='qty'){
	$sql=$sql."Incorrect Item Type' WHERE transactionID=".$txid;
}
else if($reasoncombo=='item'){
	$sql=$sql."Incorrect Quantity' WHERE transactionID=".$txid;
}

$result=mysqli_query($con,$sql);


$sqlrefund = 'SELECT transactionID, total FROM `order` where transactionID = '.$txid.' limit 1 ';
$resultrefund = mysqli_query($con, $sqlrefund);
$rowsrefund = mysqli_fetch_array($resultrefund);
$total = $rowsrefund['total'];

$sqlcust = 'SELECT customerID, customerBalance FROM `customer` where customerID = '.$custid.' limit 1 ';
$resultcust = mysqli_query($con, $sqlcust);
$rowscust = mysqli_fetch_array($resultcust);
$custbal = $rowscust['customerBalance'];


$newtotal = $total+$custbal;

$sqlupdate ="UPDATE `customer` SET customerBalance=".$newtotal." WHERE customerID='".$custid."'";
$resultupdate=mysqli_query($con,$sqlupdate);



mysqli_close($con);
header("Location: ../transaction-history.php");


?>