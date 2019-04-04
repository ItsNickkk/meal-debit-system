<?php session_start(); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>accountSettingAction.php</title>
</head>

<body>
	
	
	<?php include 'conn.php';
	
	$dupkey="1062";
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	if(md5($password) == 'd41d8cd98f00b204e9800998ecf8427e'){
		$sql = "UPDATE customer SET
		customerPhone = '".$phone."', 
		customerEmail = '".$email."', 
		customerUsername = '".$username."' 
		WHERE customerID = '".$_SESSION['ID']."'";
	} else {
		$sql = "UPDATE customer SET
		customerPhone = '".$phone."', 
		customerEmail = '".$email."', 
		customerUsername = '".$username."', 
		customerPassword = '".md5($password)."'
		WHERE customerID = '".$_SESSION['ID']."'";
	}
	
	$result = mysqli_query($con,$sql);
	
	if (mysqli_affected_rows($con)<=0){
    	echo "<script>window.location.href='../accountSettings.php';</script>";
  	} else {
		echo "<script>window.location.href='../account.php';</script>";
	}
	
	
	
	
	?>
	
	
	
</body>
</html>