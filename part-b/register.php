<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Register</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php require 'header.php'; ?>
	
	<div class="center" style="margin-bottom: 15vh">
	<p style="margin: 5vh; font-size: 5vh">Register</p>
	<form method="post" action="actionScripts/registerAction.php">
		
		<table id="registerTable" cellpadding="10vh">
			<tr><td><label for="ic">IC Number</label><br><input type="text" name="ic" required></td></tr>
			<tr><td><label for="name">Name</label><br><input type="text" name="name" required></td></tr>
			<tr><td><label for="phone">Phone Number</label><br><input type="text" name="phone" required></td></tr>
			<tr><td><label for="email">Email Address</label><br><input type="email" name="email" required></td></tr>
			<tr><td><label for="username">Username</label><br><input type="text" name="username" required></td></tr>
			<tr><td><label for="password">Password</label><br><input type="password" name="password" required></td></tr>
			<tr><td><button id="register">Register</button></td></tr>
		</table>
		
	</form>
	
	</div>
	<?php require 'navBar.php'; ?>
	
	
	<script>
	
	document.getElementById("active").textContent = "Register"
	
	</script>
	
	
</body>
</html>
