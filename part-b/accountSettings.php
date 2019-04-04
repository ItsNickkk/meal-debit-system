<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Account Settings</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
<link href="CSS/main.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php require 'header.php'; 
	
	include 'actionScripts/conn.php';
	
	$sql = "SELECT * from customer WHERE customerID = '".$_SESSION['ID']."'";
	$result = mysqli_query($con,$sql);
	
	if(!mysqli_query($con,$sql)){
		echo "window.location.href='accountSettings.php';</script>";
		
	} else {
		if($row=mysqli_fetch_array($result))
		{
			$ic = $row['customerIC'];
			$name = $row['customerName'];
			$phone = $row['customerPhone'];
			$email = $row['customerEmail'];
			$username = $row['customerUsername'];
			$currentPassword = $row['customerPassword'];
		}
	}
	?>
	
	<div class="center" style="margin-bottom: 15vh">
	<p style="margin: 5vh; font-size: 5vh">Settings</p>
	<form method="post" action="actionScripts/accountSettingsAction.php">
		<table id="registerTable" cellpadding="10vh">
			<tr><td><label for="ic">IC Number</label><br><input type="text" name="ic" required disabled value="<?php echo $ic; ?>"></td></tr>
			<tr><td><label for="name">Name</label><br><input type="text" name="name" required disabled value="<?php echo $name; ?>"></td></tr>
			<tr><td><label for="phone">Phone Number</label><br><input type="text" name="phone" required value="<?php echo $phone; ?>"></td></tr>
			<tr><td><label for="email">Email Address</label><br><input type="email" name="email" required value="<?php echo $email; ?>"></td></tr>
			<tr><td><label for="username">Username</label><br><input type="text" name="username" required value="<?php echo $username; ?>"></td></tr>
			<tr><td><label for="password">Password</label><br><input type="password" name="password"></td></tr>
			<tr><td><button id="register">Confirm</button></td></tr>
		</table>
		
	</form>
	
	</div>
	<?php require 'navBar.php'; ?>
	
	
	
</body>
</html>
