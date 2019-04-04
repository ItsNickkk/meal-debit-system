<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>loginAction.php</title>
</head>

<body>
	
	<?php include 'conn.php';
		
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	
	$sql = "Select * from customer where customerUsername = '".$username."' and customerPassword = '".md5($password)."';";
	$result = mysqli_query($con,$sql);
	
	if (mysqli_affected_rows($con)<=0)
	{
    	echo "<script>alert('User not found!');</script>";
    	echo "<script>window.location.href='../login.php';</script>";
  	}
	
	if($row=mysqli_fetch_array($result))
	{
		session_start();
		$_SESSION['loggedIn'] = 'true';
		$_SESSION['username'] = $row['customerUsername'];
		$_SESSION['balance'] = $row['customerBalance'];
		$_SESSION['ID'] = $row['customerID'];

		echo "<script>window.location.href = '../home.php';</script>";
	}
	?>
	
</body>
</html>