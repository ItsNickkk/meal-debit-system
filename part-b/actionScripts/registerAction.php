<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>registerAction.php</title>
</head>

<body>
	
	
	<?php include 'conn.php';
	
	$dupkey="1062";
	$ic = mysqli_real_escape_string($con, $_POST['ic']);
	$name = mysqli_real_escape_string($con, $_POST['name']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$sql = "INSERT INTO customer (
	customerIC, 
	customerName, 
	customerPhone, 
	customerEmail, 
	customerUsername, 
	customerPassword
	) VALUES (
	'$ic',
	'$name',
	'$phone',
	'$email',
	'$username',
	'".md5($password)."'
	);";
	
	
	if(!mysqli_query($con,$sql)){
		echo "window.location.href='../register.php';</script>";
		
	} else {
		echo "<script>alert('Register Successful! Please login now!');";
		echo "window.location.href='../login.php';</script>";
	}
	
	
	?>
	
	
	
</body>
</html>