<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Register</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css">
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<div class="center">
		<?php require 'header.php'; ?>
	
		<div>
			<table cellspacing="15">
			
				<tr><td>Already have an account?</td></tr>
				<tr><td><button onclick="location.href='login.php'" class="pay">Login</button></td></tr>
				<tr><td>New to Dishcourt?</td></tr>
				<tr><td><button onclick="location.href='register.php'" class="pay">Register</button></td></tr>
			
			</table>
			
			
		
		</div>	
		
		<?php require 'navBar.php'; ?>
	
	</div>
	
	
</body>
</html>