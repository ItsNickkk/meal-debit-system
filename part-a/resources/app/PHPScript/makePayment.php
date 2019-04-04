<?php
session_start();
include('conn.php');

//Verify money
$paymentQR = mysqli_real_escape_string($con,$_POST['paymentqr']);
$total = mysqli_real_escape_string($con,$_POST['total']);

$memberid = substr($paymentQR, 0,7);
$payAmount = substr($paymentQR, 10);
$verifySQL = "SELECT * FROM customer where customerid='".$memberid."'";
$resultVerify = mysqli_query($con, $verifySQL);
$rowsVerify=mysqli_fetch_array($resultVerify);


if(mysqli_num_rows($resultVerify)>0){
	$customerBal = $rowsVerify['customerBalance'];

	if($payAmount <= $customerBal){
		if($payAmount>=$total){
			$afterCustomerBal = $customerBal - $total;
		}
		else{
			echo "Insufficient pay amount!";
			mysqli_close($con);
			exit;
		}
	}
	else{
		echo "Insufficient Balance!!";
		mysqli_close($con);
		exit;
	}

	if($afterCustomerBal>= 0){
		$sqlBal = "UPDATE customer SET customerBalance=".$afterCustomerBal." where customerID =".$memberid;
		$result=mysqli_query($con,$sqlBal);
		
		if(mysqli_affected_rows($con)<=0){
			echo "failed, Nothing is changed";
			mysqli_close($con);
		}
		else{		
			echo "success";
			mysqli_close($con);
			}
	}
	else{
		echo "Insufficient Balance!";
		mysqli_close($con);
	}

}
else{
	echo "Invalid payment code";
	mysqli_close($con);
}
?>