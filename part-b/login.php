<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link href="CSS/loginRegister.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<?php require 'header.php'; ?>
	
	<div class="center">
	<p style="margin: 5vh; font-size: 5vh">Login</p>
	<form method="post" action="actionScripts/loginAction.php">
		
	<table id="registerTable" cellpadding="10vh">
		<tr>
			<td><label for="username">Username</label><br><input type="text" name="username" required></td>
		</tr>
		<tr>
			<td><label for="password">Password</label><br><input type="password" name="password" required></td>
		</tr>
		<tr>
			<td><button id="register">Login</button></td>
		</tr>
	</table>
		
	</form>
	
	</div>
	
	<?php require 'navBar.php'; ?>
	
	<script>
	
	document.getElementById("active").textContent = "Login"
	
	</script>
</body>
</html>